<!-- <p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p> -->
# What
I am making Book Review site.

# Proto
You can check this app on <a href="">AWS</a>!
Please search for it on the internet.

<img width="1000" alt="screen1" src="https://user-images.githubusercontent.com/66307522/93222925-6fc67700-f7aa-11ea-8cec-adaf399b952c.png">

# About
This app is Book Review site. You can use full systems! Please make an account.

# Technology used
This application uses the following open source packages:

<img width="531" src="https://user-images.githubusercontent.com/66307522/93224603-3ee74180-f7ac-11ea-8e2f-899d4181827d.jpg">

# Database

## users table
|Column|Type|Options|
|------|----|-------|
|id|bigIncrements||
|name|string||
|email|string|unique|
|email_verified_at|timestamp|nullable|
|password|string||


### Association
- has_many :tweets
- has_many :comments


## tweets table
|Column|Type|Options|
|------|----|-------|
|title|string|null: false|
|text|text|null: false|
|user_id|integer|null: false|

### Association
- belongs_to :user
- has_many :comments


## comments table
|Column|Type|Options|
|------|----|-------|
|text|text|null: false|
|user_id|integer|null: false|
|tweet_id|integer|null: false|

### Association
- belongs_to :tweet
- belongs_to :user 

## articles table
|Column|Type|Options|
|------|----|-------|
|title|string|null: false|
|body|text|null: false|
|user_id|references| null: false|

### Association
- belongs_to :user
- has_many :novels


## novels table
|Column|Type|Options|
|------|----|-------|
|title|string|null: false|
|body|text|null: false|
|user_id|references|null: false, foreign_key: true|
|article_id|references|null: false, foreign_key: true|

### Association
- belongs_to :article
- belongs_to :user 
