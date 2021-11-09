## REST API

A RESTful API for a personal blog 
- Users Resource
- Authentication using Laravel sanctum
- Scope based Authorization
- Seeding Database With Model Factory
- Event Handling


## Getting Started
First, clone the repo:
```bash
$ git clone https://github.com/Ahmad-Faqehi/Ahmad-Blog-API.git
```
#### Install dependencies
```
$ cd Ahmad-Blog-API
$ composer install
```

#### Configure the Environment
Create `.env` file:
```
$ cat .env.example > .env
```
<b>Todo:</b> Add database config to .env file 

#### Generate Key 
Create `.env` file:
```
$ php artisan key:generate
```
### API Routes
| HTTP Method	| Path | Action | Scope | Desciption  |
| ----- | ----- | ----- | ---- |------------- |
| GET      | /posts | index | posts:list | Get all posts
| GET     | /post/{id} | show | post:read | Read post
| POST      | /post | store | post:create |  Create new post
| DELETE      | /post/{id} | delete | post:delete |  Delete the post
| POST      | /post/{id} | update | post:update |  Update the post
| GET      | /categories | index | categories:list | Get all categories
| GET     | /category/{category_name} | show | category:read | Get posts by category
| POST      | /login | show | user:find |  User login   
| POST      | /register | store | user:create | Create new user
| POST      | /logout | logout | user:end | End session of user


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contact

Ahmad Faqehi - [@A_F775](https://twitter.com/A_F775) - alfaqehi775@hotmail.com

Project Link: [https://github.com/Ahmad-Faqehi/Ahmad-Blog-API](https://github.com/Ahmad-Faqehi/Ahmad-Blog-API)

[![LinkedIn][linkedin-shield]][linkedin-url]
[![Twitter][twitter-shield]][twittwe-url]
[![Twitter][github-shield]][github-url]



<!-- MARKDOWN LINKS & IMAGES hdgs -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/ahmad-faqehi
[twitter-shield]: https://img.shields.io/badge/-twitter-black.svg?style=for-the-badge&logo=twitter&colorB=555
[twittwe-url]: https://twitter.com/A_F775
[github-shield]: https://img.shields.io/badge/-github-black.svg?style=for-the-badge&logo=github&colorB=555
[github-url]: https://github.com/Ahmad-Faqehi   