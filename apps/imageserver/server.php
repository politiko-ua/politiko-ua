<?

require_once getenv('FRAMEWORK_PATH') . '/library/kernel/load.php';
load::system('kernel/conf');

conf::set('project_root', realpath(dirname(__FILE__) . '/../..'));

require_once '../../conf/' . getenv('ENVIRONMENT') . '.php';
load::system('kernel/application');
require_once '../application.php';

$app = new project_application();
$app->init();

load::system('storage/storage_simple');
$storage = new storage_simple();

$components = explode('/', $_GET['q']);
$file_hash = implode('/', $components);

if ( !$size = array_shift($components) )
{
	exit;
}

$size_params = conf::get('image_types');
if ( !$size_params[$size] )
{
	exit;
}

$size_params = $size_params[$size];

if ( !$storage->exists( $file_hash ) )
{
	$original_file_hash = implode('/', $components);

	if ( !$storage->exists( $original_file_hash ) )
	{
		$image_type = $components[0] ? $components[0] : 'user';
		$original_file_path = conf::get('project_root') . '/data/assets/default-images/' . $image_type . '.jpg';

		$file_hash = $size . $image_type;
	}
	else
	{
		$original_file_path = $storage->get_path($original_file_hash);
	}

	$file_path = $storage->get_path( $file_hash );
	$storage->prepare_path( $file_path );

	$image_size = getimagesize($original_file_path);
	if ( $image_size['mime'] != 'image/jpeg' )
	{
		$t = tempnam('/var/tmp', 'ims');
		copy($original_file_path, $t);
		exec("convert {$t} {$t}.jpg");
		copy($t . '.jpg', $original_file_path);
		unlink($t); unlink("{$t}.jpg");
	}

	if ( !$size_params['exact'] ) $resize_opt = '\>';

	if ( $size_params['crop'] )
	{
		$size_details = explode('x', $size_params['size']);

		if ( $image_size[0] > $image_size[1] )
		{
			$ratio = $image_size[0]/$image_size[1];
			$resizeTo = ceil($size_details[0] * $ratio) . 'x' . $size_details[1];
		}
		else
		{
			$ratio = $image_size[1]/$image_size[0];
			$resizeTo = $size_details[0] . 'x' . ceil($size_details[1] * $ratio);
		}

		
		$cmd = "convert {$original_file_path} -resize {$resizeTo}{$resize_opt} {$file_path}";
		# error_log($cmd);
		exec($cmd);
		exec("convert {$file_path} -gravity Center -crop {$size_params['size']}+0+0 {$file_path}");
	}
	else
	{
		$cmd = "convert {$original_file_path}  -resize {$size_params['size']}{$resize_opt} {$file_path}";
		# error_log($cmd);
		exec($cmd);
	}
}

ini_set('zlib.output_compression', 0);

header('Content-Type: image/jpeg');
echo $storage->get($file_hash);
