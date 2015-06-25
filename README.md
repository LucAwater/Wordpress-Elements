# Wordpress Elements

This is a Wordpress framework, which can be used in a variety of ways. It contains a wordpress setup with a multiple server config method and wordpress as a submodule. It also has a basic wordpress theme. It contains elements like a gallery, grid, text block and more. To make it even easier, there's also an Advanced Custom Fields(ACF) export file so you don't have to manually add these with every install.

Although this framework is initially build for onepagers, of course it can easily be used to make larger websites, go crazy.

Wordpress Elements initially assumes a setup with these dependencies:
* You have multiple servers(local, development, production)
* You have an Advanced Custom Fields(ACF) license key


## Getting started

1. Git clone git@github.com:LucAwater/Wordpress-Elements.git .
2. Git submodule init
3. Git submodule update
4. Go to http://yourwebsite.com/wordpress/wp-admin
5. Install all plugins
6. Activate 'Elements' theme
7. import 'acf.json' file in ACF
8. Begin building something awesome


## Theme
###Class system
The class system in the elements theme is setup to be readable, flexible and easily extendable.

**Module**  module
            module variant
            
**State**   indicator
            indicator extension
            subject
            subject variant
            
Module example: `<div class=“grid grid-primary”>`

module          = grid
module variant  = primary

State example: `<div class=“is-bold is-pos-left has-no-pad-top”>`

indicator           = is, has
indicator extension = no
subject             = bold, pos, pad
subject variant     = left, top
