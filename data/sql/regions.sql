--
-- PostgreSQL database dump
--

SET client_encoding = 'UTF8';
SET standard_conforming_strings = off;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET escape_string_warning = off;

SET search_path = public, pg_catalog;

--
-- Name: regions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('regions_id_seq', 27, true);


--
-- Data for Name: regions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY regions (id, name_ru, name_ua) FROM stdin;
3	Киев и Киевская область	Київ і Київська область
4	Автономная Республика Крым	Автономна республіка Крим
5	Винницкая область	Вінницька область
6	Волынская область	Волинська область
7	Днепропетровская область	Дніпропетровська область
8	Донецкая область	Донецька область
9	Житомирская область	Житомирська область
10	Закарпатская область	Закарпатська область
11	Запорожская область	Запорізька область
12	Ивано-Франковская область	Івано-Франківська область
13	Кировоградская область	Кіровоградська область
14	Луганская область	Луганська область
15	Львовская область	Львівська область
16	Николаевская область	Миколаївська область
17	Одесская область	Одеська область
18	Полтавская область	Полтавська область
19	Ровненская область	Рівненська область
20	Сумская область	Сумська область
21	Тернопольская область	Тернопільська область
22	Харьковская область	Харківська область
23	Херсонская область	Херсонська область
24	Хмельницкая область	Хмельницька область
25	Черкасская область	Черкаська область
26	Черновицкая область	Чернівецька область
27	Черниговская область	Чернігівська область
\.


--
-- PostgreSQL database dump complete
--

