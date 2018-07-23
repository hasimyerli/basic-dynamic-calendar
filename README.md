### Basic Dynamic Calendar
<p>
  <img src="https://hasimyerli.com/projects/images/project-img/calendar1.png">
</p>

**Nedir?**

Dinamik olarak html takvim oluşturur.

[Demo](https://hasimyerli.com/projects/calendar-class.php)


**Nasıl kullanılır?**

```php
<?php
if (empty($_GET["month"]) || empty($_GET["year"])) {
  $month = date("m");
  $year = date("Y");
}
else {
  $month = $_GET["month"];
  $year = $_GET["year"];
}
?>
```
    Not: bu satırı tr arasına yazmalısınız.

Üstteki değişkenleri parametre olarak alır ve aldığı parametrelere göre hesap yapar, parametre almadığı zaman günün tarihini baz alır.

```php
<?php
  $calendar = new calendar($month,$year);
?>
```
Ayin ismini verir. Tablonun üst kısmında yer alan bölüm için.

```php
<?php
  $calendar->get_month_name($month);
?>
```

Günlerin isimini verir.

```php
<?php
  $calendar->get_day_name();
?>
```

Ayın günlerini getirir.

```php
<?php
  $calendar->get_day_of_week();
?>
```
