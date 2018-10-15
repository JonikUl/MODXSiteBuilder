1) Файл external-config.json выгружается в папку ../assets/components/modxstarterbuild/tinymcerte/js/external-config.json. Путь в настройках прописывается
автоматически. В файле присутствуют настройки для плагинов Template, Code Sample и Spellchecker.
Редактирование шаблонов происходит в "url": "../templates/image.html". Нужно создать данный путь и файл, в нем уже редактировать шаблон.

2) Папку typograf поместить в ../assets/components/tinymcerte/js/vendor/tinymce/plugins/.
Это сам плагин typograph. Если он вам не нужен, отключите его в MODX в настройках TinymceRTE.