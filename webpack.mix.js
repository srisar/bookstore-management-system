const mix = require('laravel-mix');

mix.options({
    terser: {
        extractComments: false,
    }
});

mix.js('vue/homepage/home.app.js', 'bookstore/homepage/').vue();

mix.js('vue/supplier/add/add-supplier.js', 'bookstore/supplier/').vue();
mix.js('vue/supplier/edit/edit-supplier.js', 'bookstore/supplier/').vue();
mix.js('vue/supplier/manage/manage-suppliers.js', 'bookstore/supplier/').vue();

mix.js('vue/users/manage/manage-users.js', 'bookstore/users/').vue();

mix.js('vue/subjects/manage-subjects.js', 'bookstore/subjects/').vue();
mix.js('vue/books/manage-books.js', 'bookstore/books/').vue();

mix.js('vue/books-purchase/add/add-book-purchase.js', 'bookstore/books-purchase/').vue();
mix.js('vue/books-purchase/view-all/view-all-book-purchases.js', 'bookstore/books-purchase/').vue();
