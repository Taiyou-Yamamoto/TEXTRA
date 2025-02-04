# TEXTRA   　- 書籍用メモ登録アプリ-
___
## 概要

『TEXTRA』は、読書中に重要なポイントやインスピレーションを手軽にメモとして残せる書籍用メモ登録アプリです。メモはスライド形式で簡単に振り返ることができ、効率的に読書の内容を整理・管理します。また、検索機能で必要な情報を素早く検索できることが特徴です。さらに、複数デバイス間での同期が可能で、いつでもどこでもメモにアクセス可能です。

## 特徴
- ログイン・ログアウト機能
- 書籍ごとにメモを登録・編集
- キーワード検索や種別によって、目的のメモへ瞬時にアクセス可能
- 登録したメモをスライド表示で見返し可能
- 直感的で機能的なデザイン

## DB設計

| テーブル名  | 説明 |
| ------------- | ------------- |
|  users  | 利用者  |
|  books  | 登録書籍|
|  notes  |   書籍のメモ  |

### users
| カラム名             | 型                       | 説明                       |
|----------------------|-------------------------|----------------------------|
| id                  | bigint (auto increment) | ユーザーのユニークID       |
| name                | string                  | ユーザー名                 |
| email               | string                  | ユーザーのメールアドレス   |
| email_verified_at   | timestamp               | メールアドレス確認日時     |
| password            | string                  | パスワード                 |
| remember_token      | string                  | ログイン保持トークン       |
| created_at          | timestamp               | 作成日時                   |
| updated_at          | timestamp               | 更新日時                   |

### books
| カラム名       | 型                       | 説明                                  |
|---------------|-------------------------|--------------------------------------|
| id           | bigint (auto increment) | 書籍のユニークID                    |
| user_id      | bigint                   | users の id と紐付け                 |
| title        | string(100)              | 書籍のタイトル                       |
| type         | string(20)               | 書籍の種類（例: 小説, 技術書）       |
| image_path   | string                   | S3 へのユーザーごとのファイルパス   |
| created_at   | timestamp                | 作成日時                             |
| updated_at   | timestamp                | 更新日時                             |

### notes
| カラム名       | 型                       | 説明                      |
|---------------|-------------------------|---------------------------|
| id           | bigint (auto increment) | メモのユニークID          |
| book_id      | bigint                   | 書籍の ID と紐付け        |
| user_id      | bigint                   | ユーザー ID と紐付け      |
| type         | string                   | メモのタイトル            |
| content      | string(1500)             | メモの内容（最大1500文字） |
| page_number  | integer                  | メモが対応するページ番号（オプション） |
| created_at   | timestamp                | 作成日時                  |
| updated_at   | timestamp                | 更新日時                  |

## ER図

![E-R](https://github.com/user-attachments/assets/31c8ca7c-d2e4-4588-89cb-485e6d359d42)



## 開発環境
- フロントエンド　/　バックエンド 
  - PHP 8.2.23 
  - Laravel 10.48.20  
- スタイリング
  - Tailwind 3.4.10
- データベース
  - MySQL 8.0.39  
- 画像ストレージ
  - AWS s3
- デプロイ
  - heroku
- ローカル開発環境
  - MAMP


## ご利用
[アプリケーションに移動](https://book-memo-application-e17d5ea20201.herokuapp.com)

## テストアカウント情報
メールアドレス original@gmail.com  
パスワード test1@gmail.com
