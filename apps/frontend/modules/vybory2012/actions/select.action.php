<?

load::app('modules/vybory2012/controller');
class vybory2012_select_action extends vybory2012_controller
{
	protected $authorized_access = true;
	protected $credentials = array('admin');
        
	public function execute()
	{
                if (request::get('submit'))
                {   
                    db::exec('UPDATE parties SET vybory_2012=0');
                    db::exec('UPDATE parties SET vybory_2012=1 WHERE id in ('.implode(request::get('party'),',').')');
                    
                    foreach(request::get('title') as $id=>$title) {
                            db::exec('UPDATE parties SET title=:title  WHERE id='.$id, array('title'=>$title));
                       // echo 'UPDATE parties SET title="'.$title.'" WHERE id='.$id;
                    }
                }
		$this->list = parties_peer::instance()->get_list();
	}
}
