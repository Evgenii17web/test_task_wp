# How to create a shortcode

1. Створити плагін
2. В коді плагіна використовується код
   `add_shortcode('bags_products', 'bags_products');`, який реєструє шорткод у системі.
3. `bags_products` - це функція-обробник, яка повертає дані, які будуть відображені на сторінці. Код можна знайти у файлі `wp-content/plugins/task1/add-shortcode-bags_products.php`

Також реєструвати шорткоди можна в файлі теми functions.php.


# How to get a list of products with custom parameters
В функції `bags_products` через обьєкт `$wpdb` ми робимо SQL запит та отримуєм від бази даних імена продуктів які можемо вивести на сторінку за допомогою шорткоду.

Використовуючи шорткод ми можемо передати атрибути `category` та `limit`, тобто вибрати категорію та кількість товарів.