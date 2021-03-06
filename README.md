ДЕМОНСТРАЦИОННЫЙ ПРОЕКТ "Литераторы"
----------------

В данном репозитории представлен демонстрационный проект "Литераторы". Настоящее руководство
описывает цель и задачи данного проекта, инструкцию по установке и настройке проекта, а так же его краткое описание. 
Настоящее руководство ни в коем случае и ни при каких обстоятельствах нельзя считать документацией к проекту, и следует 
рассматривать исключительно как вольное описание проекта.

Данный проект не стоит рассматривать как исчерпывающий и финальный показатель знаний и навыков автора проекта. Он создан исключительно для
того, чтобы заинтересованный работодатель смог составить общее представление об уровне владения фреймворком Yii2. 
Все спорные моменты и вопросы автор готов обсудить с потенциальным работодателем. 

Разработка проекта может и будет приостановлена в случае поступления тестового задания от потенциального работодателя.

Если вы нашли какую-то ошибку\недочёт\проект не работает\произошла любая другая внештатная ситуация, связанная с проектом,
а у вас, в свою очередь есть время и желание сообщить об этом автору? Сообщайте, автор будет очень вам признателен.

Конфигурация, на которой разрабатывается проект:

Ubuntu 16.04/xenial
Apache 2.4.18
Mysql 5.7.27
PHP 7.3.9

Цель
-------------------

Целью проекта "Литераторы" является демонстрация потенциальному работодателю некоторых профессиональных навыков, связанных, по большей части с фреймворком Yii2

Задачи
-------------------

Каждую задачу данного проекта можно рассматривать как отдельный пример демонстрации степени знаний и умения использовать
ту или иную возможность фреймворка Yii2, использованную для решения поставленной задачи. Последовательность 
выполнения задач может быть изменена автором и не соответствовать представленной. Также список задач может пополняться новыми
(при этом уже существующие задачи так или иначе будут выполнены)

1. Создание сущности Книги. 

2. Создание сущности Авторы.

3. Создание сущности Жанры.
 
4. Создание дополнительной сущности "Сделки".

5. Создание соответствующих связей между выше представленными сущностями.

6. Реализация системы регистрации и аутентификации.

7. Реализация системы авторизации на основе RBAC.

8. Реализация Restfull API в виде отдельного модуля.

9. Реализация т.н "живого поиска" по книгам и авторам.

10. Создание корзины.

11. Реализация CRUD операций для всех сущностей, а так же для корзины.

Установка
-------------------

Настройки для Apache

```

Настройки виртуального хоста

<VirtualHost *:80>
    ServerName literators
    DocumentRoot "/var/www/literators"
  <Directory "/var/www/literators">
     AllowOverride all
  </Directory>
</VirtualHost>

Настройки файла .htaccess (в корневой директории проекта)

Options +FollowSymlinks
IndexIgnore */*
RewriteEngine On

RewriteCond %{REQUEST_URI} ^/(admin)
RewriteRule ^admin/assets/(.*)$ backend/web/assets/$1 [L]
RewriteRule ^admin/css/(.*)$ backend/web/css/$1 [L]

RewriteCond %{REQUEST_URI} !^/backend/web/(assets|css)/
RewriteCond %{REQUEST_URI} ^/(admin)
RewriteRule ^.*$ backend/web/index.php [L]

RewriteCond %{REQUEST_URI} ^/(assets|css|js|images|fonts|uploads|robots.txt)
RewriteRule ^assets/(.*)$ frontend/web/assets/$1 [L]
RewriteRule ^css/(.*)$ frontend/web/css/$1 [L]
RewriteRule ^js/(.*)$ frontend/web/js/$1 [L]
RewriteRule ^images/(.*)$ frontend/web/images/$1 [L]
RewriteRule ^fonts/(.*)$ frontend/web/fonts/$1 [L]
RewriteRule ^fonts/(.*)$ frontend/web/uploads/$1 [L]
RewriteRule ^robots.txt/(.*)$ frontend/web/robots.txt/$1 [L]
RewriteRule ^(.*)$ frontend/web/$1 [L]

RewriteCond %{REQUEST_URI} !^/(frontend|backend)/web/(assets|css|js)/
RewriteCond %{REQUEST_URI} !index.php
RewriteCond %{REQUEST_FILENAME} !-f [OR]
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^.*$ frontend/web/index.php

Настройки файла .htaccess (в директории web(для frontend и backend))

RewriteEngine on

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d

RewriteRule . index.php

```

