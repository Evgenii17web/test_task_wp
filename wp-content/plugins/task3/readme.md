# Плагін додає кастомне поле `position` в юзер профайл в адмінці, та додає це поле в динамічні теги в Elementor.


### Instructions on how to add a new custom field “Position” in the user edit page

В файлі `wp-content/plugins/task3/add-position-field-to-customer.php` через хуки  
`add_action('show_user_profile', 'add_user_position_field');`  
`add_action('edit_user_profile', 'add_user_position_field');`  
`add_action('personal_options_update', 'save_user_position_field');`  
`add_action('edit_user_profile_update', 'save_user_position_field');`

плагін додає нове поле `position` в юзер профайл.  
`add_user_position_field` - рендерить поле  
`save_user_position_field` - зберігає поле в дані про юзера

### Instructions on how to add dynamic content in Elementor

В файлі `wp-content/plugins/task3/add-position-field-to-customer.php` через хук  
`add_action( 'elementor/dynamic_tags/register', 'register_tags' );`  
плагін реєструє нове динамічне поле за допомогою класа `wp-content/plugins/task3/tags/position.php`  
В цьому класі описані методи які додають назву, категорію та групу поля. Метод `render` рендерить динамічне поле `position`

### How to add an Elementor template to the end of each article using the PHP function

Файл доічрньої теми `wp-content/themes/best-shop-child/template-parts/content-single.php` переписує файл батьківскої теми. В цьому файлі додана одна строка `<div><?= do_shortcode('[elementor-template id="248"]');?></div>` в якій за допомогою шорткода виводиться темплейт який можно знайти в адмінці в Шаблони -> Збережені шаблони під назвою TT Author static component. Цей темплейт рендерить аватар, ім'я, біографію, позицію(position) юзера та лінку на його профайл.

Якщо ви використовуєте дамп бази даних ви можете побачити блок з інформацією про автора на сторінках  
`http://emrg/cooking-healthful-joyful/`  
`http://emrg/elementor-293/`