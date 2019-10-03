
# demo-php-office-for-read-dict-db


## 緣起

這個專案是要用來回覆「[使用LibreOffice Calc來編輯中文詞彙接龍的可能性？](https://www.ubuntu-tw.org/modules/newbb/viewtopic.php?post_id=361772#forumpost361772)」所寫的範例。

## clone

執行下面指令

``` sh
$ git clone https://github.com/samwhelp/demo-php-office-for-read-dict-db.git
```

執行下面指令，切換到「demo-php-office-for-read-dict-db」這個資料夾。

```sh
$ cd demo-php-office-for-read-dict-db
```

## 前置作業

### 安裝相依的lib

執行下面指令

``` sh
$ composer install
```

> 關於「[composer](https://getcomposer.org/)」的安裝，請參考另一個專案的「[說明](https://github.com/samwhelp/demo-php-office/tree/master/demo-install-composer/ex-install-composer)」。

### 下載字典的原始資料

執行下面指令，

``` sh
$ make asset-dict-concised
```

會從「[教育部國語辭典公眾授權網](https://language.moe.gov.tw/001/Upload/Files/site_content/M0001/respub/index.html) / [《國語辭典簡編本》資料下載](https://language.moe.gov.tw/001/Upload/Files/site_content/M0001/respub/dict_concised_download.html)」，

下載「[dict_concised_2014_20190411.zip](https://language.moe.gov.tw/001/Upload/Files/site_content/M0001/respub/download/dict_concised_2014_20190411.zip)」這個檔案到「var/dict_concised」這個資料夾，

也就是「var/dict_concised/dict_concised_2014_20190411.zip」，

並且解開，就會產生一個檔案「var/dict_concised/dict_concised_2014_20190411.xls」。

## 操作步驟

### 將xls檔案轉檔

執行下面指令

``` sh
$ make dict-concised-db-save
```

會產生一個檔案「var/db/DictConcised.txt」，格式是「[php serialize](https://www.php.net/manual/en/function.serialize.php)」過後的內容。


### 挑選出四個字的成語

執行下面指令

``` sh
$ make dict-concised-db-save-four
```

會產生一個檔案「var/db/DictConcised-Four.txt」，格式是「[php serialize](https://www.php.net/manual/en/function.serialize.php)」過後的內容。



### 找出成語可以有接龍的對應表。

執行下面指令

``` sh
$ make dict-concised-db-save-link
```

會產生一個檔案「var/db/DictConcised-Link.txt」，格式是「[php serialize](https://www.php.net/manual/en/function.serialize.php)」過後的內容。

### 成語接龍列表

#### 列表

執行下面指令

``` sh
$ make dict-concised-link-list
```

就會產生所有的成語接龍列表

#### 列表分頁顯示

執行下面指令

``` sh
$ make dict-concised-link-list | less
```

就會產生所有的成語接龍列表，並且分頁顯示

#### 過濾

執行下面指令，找出開頭是「'會心一笑'」的。

``` sh
$ make dict-concised-link-list | grep '^/會心一笑'
```

就會顯相關的成語接龍列表 (每一行是一種結果)

```
/會心一笑/一笑置之/置之不理/不理不睬
/會心一笑/一笑置之/置之度外
```

執行下面指令，找出開頭是「'滿面春風'」的。

``` sh
$ make dict-concised-link-list | grep '^/滿面春風'
```

就會顯相關的成語接龍列表 (每一行是一種結果)

```
/滿面春風/春風得意/得意洋洋/洋洋大觀
/滿面春風/春風得意/得意洋洋/洋洋得意/得意揚揚
/滿面春風/春風得意/得意洋洋/洋洋得意/得意忘形
/滿面春風/春風得意/得意洋洋/洋洋灑灑
/滿面春風/春風得意/得意揚揚
/滿面春風/春風得意/得意忘形
/滿面春風/春風化雨
```

#### 計算行數

執行下面指令

``` sh
$ make dict-concised-link-list | wc
```

顯示

```
1347    1347   47133
```


## PHPOffice 相關專案

* [demo-php-office](https://github.com/samwhelp/demo-php-office)

## PHPOffice 相關討論

* [關於「PHPOffice」的使用範例](https://www.ubuntu-tw.org/modules/newbb/viewtopic.php?post_id=361316#forumpost361316)
