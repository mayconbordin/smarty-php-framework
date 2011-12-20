=Smarty Framework=

==Framework Features==
  * Class autoloading
  * MVC
  * Smarty template
  * Simple controller/view convention
  * Front Controller
  * Single Database connection per request

==Code Examples==

===Creating an url in the view===

`{url controller='user' action='add'}`

This code will create this url: *appname/public/index.php?page=user&action=add* and will execute the action method *addAction* in the *UserController* class.

===Add another action in the view===

`{action name="form" controller="user"}`

This code will add the execute the action method *formAction* in the *UserController* class and add the html view */templates/user/form.tpl* to the current view.

===Redirect the action to another action===

`$this->redirect('user', 'index');`

This code will redirect the page to the *indexAction* in the *UserController* class.
