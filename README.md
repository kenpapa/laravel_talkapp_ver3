# Laravel グループ交流アプリ ver3

このレポジトリは次のKindle電子書籍で作成しているアプリケーションのソースコードの一つです。  

**Webアプリケーションを作ってみよう**  
**（Bootstrap Laravel MySQL 活用編）**  

- アプリケーションを作成しよう１（画面遷移まで）  
- アプリケーションを作成しよう２（基本動作まで）  
- アプリケーションを作成しよう３（完成まで）  
- **アプリケーションを作成しよう４（派生アプリ作成） <--このソースコードです**  

## 動作環境
次の環境で動作を確認しています。  
OS: Ubuntu16.04  
Bootstrap: 3.3.7  
MySQL: 5.7.16    
PHP: 7.1.0  
Laravel: 5.3.28  

## インストール手順

[0]事前にアプリが動作する環境を構築しておきます。  
（動作環境の構築については書籍の付録などをご確認ください）   

[1] GithubのレポジトリでClone or downloadボタンを押して圧縮ファイルをダウンロードします。  

[2]ファイルを解凍しlaravel_talkapp_ver3-masterディレクトリに移動します。  

[3] 下記コマンドを実行してvendorフォルダを用意します。  
composer install  

[4].env.exampleをコピーして.envファイルを用意します。  

[5]MySQLでデータベースとユーザーを準備してその情報を.envに設定します。  

（例）  
create database talkapp DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;  
grant all privileges on talkapp.* to ken@localhost identified by 'pass123';  

と準備した場合.envには次のように設定します。  

DB_DATABASE=talkapp  
DB_USERNAME=ken  
DB_PASSWORD=pass123  

[6].envファイルのAPP_KEYにアプリケーションキーを設定するため下記を実行します。  
php artisan key:generate  

[7]次のコマンドを実行してデータベースに必要なテーブルを作成します。  
php artisan migrate  

[8]サーバーを起動しhttp://localhost:8000でアクセス  
php artisan serve  

## ライセンス
LaravelのフレームワークはMITライセンスのもとにリリースされています。このプログラムはMITライセンスを採用しています。ライセンスの詳細についてはLICENSEファイルを参照してください。



