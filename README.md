# CRUD APP

A simple crud application made with Laravel, VueJS, TailwindCSS, and Vite.


## Run Locally

Clone the project

```bash
  git clone https://github.com/Pewgatsu/laravel-crud.git
```

Go to the project directory

```bash
  cd laravel-crud
```

Install dependencies

```bash
  npm install
  or
  yarn install
```

Start the server

```bash
  npm run dev
  php artisan serve
```

Edit vite.config.js and add this
```bash


import vue from '@vitejs/plugin-vue';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        vue(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});


```

