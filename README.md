<h1><strong>MODXSiteBuilder:</strong> <br>Билдер для веб разработки на CMF MODX Revolution.</h1>
<p>Автор билда: iWatchYouFromAfar <a href="https://urbancreations.ru/" target="_blank">Urban Creations</a><br/>

<h2>Описание:</h2>
<p>MODXSiteBuilder - это заготовка для быстрого развертывания сайтов на CMF MODX. При установке данного билдера вы получаете на выходе чистый MODX со всеми актуальными настройками (о них ниже) и установку нужных дополнений.</p>

<h2>Сборка:</h2>

<h2>Компоненты:</h2>
<p>Перед установкой билдер предложит вам установить некоторые компоненты, одни будут уже отмечены галочками, другие нет. Компоненты устанавливаются из двух крупнейших репозиториев modx.com/extras/ (официальный) и modstore.pro/packages/.</p>

<h4>Компоненты из репозитория modx.com/extras/</h4>

```diff
- Компоненты отмеченные звездочкой необходимо дополнительно выбрать через checkbox при установке
```

<ul>
	<li><strong>translit</strong>: Компонент транслитерации псевдонимов в MODX;</li>
	<li><strong>TinyMCE Rich Text Editor</strong>: Визуальный редактор MODX на основе TinyMCE 4;</li>
	<li><strong>FormIt</strong>: Компонент который позволяет строить динамические формы;</li>
	<li><strong>simpleUpdater</strong>: Компонент добавляет в раздел «Приложения» пункт «Обновить MODX», в котором вы можете провести апгрейд системы всего одной кнопкой;</li>
	<li><strong>BackupMODX</strong>: Компонент позволяет одной кнопкой делать Backup как базы данных, так и всего сайта;</li>
	<li><strong>*Collections</strong>: Компонент который обеспечивает более удобную работу с ресурсами;</li>
	<li><strong>*MIGX</strong>: Компонент позволяет создавать дополнительные поля (TV) в виде удобных табличек;</li>
	<li><strong>*SimpleSearch</strong>: Компонент для организации простого поиска по сайту;</li>
	<li><strong>*ReCaptchaV2</strong>: Компонент позволяет интегрировать Google ReCaptha V2 в элементы MODX;</li>
	<li><strong>*SEO Pro</strong>: SEO помошник, который позволит вам писать более дружелюбные к SEO статьи;</li>
	<li><strong>*Login</strong>: Компонент для организации регистрации/авторизации пользователей на сайте;</li>
	<li><strong>*Cron Manager</strong>: Компонент позволяет выполнять сниппеты с помощью crontab-а сервера;</li>
</ul>

<h4>Компоненты из репозитория modstore.pro/packages/</h4>
<ul>
	<li><strong>Ace</strong>: Лучший редактор кода с подсветкой, который был адаптирован для MODX;</li>
	<li><strong>pdoTools</strong>: Набор удобных сниппетов для повседневной работы + небольшая библиотека, которая делает их очень быстрыми;</li>
	<li><strong>autoRedirector</strong>: Компонент позволит вам не беспокоиться о том, что иногда адреса страниц меняются;</li>
	<li><strong>AdminTools</strong>: Пакет инструментов для администраторов;</li>
	<li><strong>phpThumbOn</strong>: Оптимизированный сниппет phpThumbOf;</li>
	<li><strong>AjaxForm</strong>: Отправка форм через Ajax. Использует FormIt, но можно указать и свой сниппет.;</li>
	<li><strong>controlErrorLog</strong>: Компонент для контроля за журналом ошибок;</li>
	<li><strong>*elementNotes</strong>: Добавляет элементам вкладку для хранения заметок;</li>
	<li><strong>*miniShop2</strong>: Самый гибкий и быстрый интернет магазин для MODX;</li>
</ul>

<h2>Чанки:</h2>
<p>Билдер устанавливает следующие чанки:</p>
<ul>
	<li><strong>performance</strong>: Чанк для тестирования и вывода результатов производительности сайта;</li>
</ul>

<h2>Плагины:</h2>
<p>Билдер устанавливает следующие плагины:</p>

<h4>Активные</h4>
<ul>
	<li><strong>dirRename</strong>: Плагин транслитерации создаваемых папок с кириллицы на латиницу;</li>
</ul>
	
<h4>Неактивные</h4>
<ul>
	<li><strong>fileRename</strong>: Плагин транслитерации загружаемых файлов с кириллицы на латиницу;</li>
</ul>

<h2>Сниппеты:</h2>
<p>Билдер устанавливает следующие сниппеты:</p>
<ul>
	<li><strong>copyright</strong>: Автоматический копирайт;</li>
	<li><strong>correctMonth</strong>: Форматирование правильного склонения месяца;</li>
	<li><strong>dateRU</strong>: Перевод месяцев и дней с английского на русский для постов;</li>
</ul>

<h2>Настройки:</h2>
<p>Билдер устанавливает следующие настройки:</p>
<h4>Системные настройки в MODX:</h4>

<ul>
	<li><strong>allow_multiple_emails</strong>: Разрешить пользователям использовать одинаковые E-Mail адреса - <strong>Нет</strong></li>
	<li><strong>friendly_alias_realtime</strong>: Создавать ЧПУ-псевдоним в реальном времени - <strong>Да</strong></li>
	<li><strong>friendly_urls</strong>: Использовать ЧПУ-псевдоним - <strong>Да</strong></li>
	<li><strong>friendly_urls_strict</strong>: Использовать ЧПУ-псевдоним - <strong>Да</strong></li>
	<li><strong>friendly_urls</strong>: Использовать ЧПУ-псевдоним - <strong>Да</strong></li>
	<li><strong>friendly_urls</strong>: Строгий режим дружественных URL - <strong>Да</strong></li>
	<li><strong>hidemenu_default</strong>: Скрыть документ из меню по умолчанию - <strong>Да</strong></li>
	<li><strong>publish_default</strong>: Публиковать по умолчанию - <strong>Нет</strong></li>
	<li><strong>use_alias_path</strong>: Использовать вложенные URL - <strong>Да</strong></li>
	<li><strong>friendly_alias_restrict_chars_pattern</strong>: Шаблон для фильтрации символов в псевдонимах - <strong><a href="https://github.com/ilyautkin/siteExtra/blob/master/core/components/site/docs/friendly_alias_restrict_chars_pattern.txt" target="_blank">Используется регулярное выражение от Ильи Уткина</a></strong></li>
	<li><strong>container_suffix</strong>: Убираем суффик псевдонима контейнеров</li>
	<li><strong>friendly_alias_translit</strong>: Транслитерация псевдонимов - <strong>russian</strong></li>
	<li><strong>resource_tree_node_name</strong>: Поле для названия узла в дереве ресурсов - <strong>menutitle</strong></li>
	<li><strong>resource_tree_node_tooltip</strong>: Поле для подсказки для узла в дереве ресурсов - <strong>textfield</strong></li>
	<li><strong>error_page</strong>: Страница ошибки 404 «Документ не найден» - <strong>указываем автоматически созданную страницу 404</strong></li>
	<li><strong>site_unavailable_page</strong>: Страница «Сайт недоступен» - <strong>указываем автоматически созданную страницу 404</strong></li>
	<li><strong>unauthorized_page</strong>: Страница ошибки 403 «Доступ запрещен» - <strong>указываем автоматически созданную страницу 404</strong></li>
	<li><strong>locale</strong>: Локаль - <strong>ru_RU.utf8</strong></li>
	<li><strong>send_poweredby_header</strong>: Отправлять заголовок X-Powered-By - <strong>Нет</strong></li>
</ul>

<h4>Системные настройки в pdoTools:</h4>
<ul>
	<li><strong>pdotools_fenom_parser</strong>: Использовать Fenom на страницах - <strong>Да</strong></li>
	<li><strong>pdotools_fenom_php</strong>: Разрешить PHP в Fenom - <strong>Да</strong></li>
	<li><strong>friendly_urls</strong>: Использовать ЧПУ-псевдоним - <strong>Да</strong></li>
</ul>

<h4>Системные настройки в Ace:</h4>
<ul>
	<li><strong>ace.font_size</strong>: Размер шрифта в редакторе - <strong>16px</strong></li>
	<li><strong>ace.tab_size</strong>: Размер табуляции в редакторе - <strong>2</strong></li>
	<li><strong>ace.theme</strong>: Тема редактора - <strong>clouds_midnight</strong></li>
</ul>

<h4>Системные настройки в TinyMCE Rich Text Editor:</h4>
<ul>
	<li><strong>tinymcerte.paste_as_text</strong>: Вставить как текст - <strong>Да</strong></li>
	<li><strong>tinymcerte.external_config</strong>: Путь к кастомному файлу external-config.jpon - <strong>../assets/components/modxstarterbuild/tinymcerte/js/external-config.json</strong></li>
	<li><strong>tinymcerte.plugins</strong>: Активируем все нужные плагины - <strong>print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern modximage modxlink code paste spellchecker typograf</strong></li>
	<li><strong>tinymcerte.skin</strong>: Устанавливаем тему lightgray для TinyMCERTE - <strong>lightgray</strong></li>
	<li><strong>tinymcerte.toolbar1</strong>: Настраиваем Панель инструментов 1 - <strong>undo redo | formatselect fontsizeselect  | bold italic strikethrough forecolor backcolor removeformat | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent</strong></li>
	<li><strong>tinymcerte.toolbar2</strong>: Настраиваем Панель инструментов 2 - <strong>link unlink openlink | image media | template codesample code cite | hr | spellchecker typograf</strong></li>
</ul>
