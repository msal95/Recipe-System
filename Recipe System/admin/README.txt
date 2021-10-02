Centaurus Bootstrap 3 Theme

CSS:
- Theme includes SASS version (SCSS) and also compiled css filed.
- SCSS folder includes only SASS version with CodeKit config included.
- LESS folder includes only LESS version with CodeKit config included. It’s port from SCSS version.
- CSS folder includes compiled SASS version for deployment.

CSS Styles (in css folder):
- The /compiled folder includes all major styles of the theme.
- The /bootstrap folder includes the bootstrap files. Bootsrap libs are not changed.
- The /lib folder includes the styles for the plugins.
- Added classes .hidden-xxs and .visible-xss for showing/hiding content on 420px's devices and smaller.

SCSS & LESS Folder:
- Bootstrap folder includes Bootstrap SASS (or LESS) version.
- Theme folder includes thw whole theme files, which should be self explanatory.

Scripts:
- Javascript code for every page is located at the end of each html template file, so you don't have to include all plugins for every page.

Icons:
- FontAwesome icons
- Glyphicons - if you move the location of bootstrap files, you need to change the relative path to icons in it.

Html:
- indexTEMPLATE.html includes empty template without content in the main content area.
- all other files includes content based on each type.
- errors - there are more versions of error files and each error file has more versions of images.
- logins - there are two version of logins.

Skins - Theme has 8 possible skins:
- Default
- White/Green - add class "theme-white" to body element of every page
- Blue Gradient - add class "theme-blue-gradient" to body element of every page
- Amethyst - add class "theme-amethyst" to body element of every page
- Blue - add class "theme-blue" to body element of every page
- Red - add class "theme-red" to body element of every page
- White/Blue - add class "theme-whbl" to body element of every page
- Green Sea - add class "theme-turquoise" to body element of every page

Layout Options:
- Fixed Header - add class "fixed-header" to body element of every page
- Fixed Footer - add class "fixed-footer" to body element of every page
- Fixed Left Menu - add class "fixed-leftmenu" to body element of every page
- Boxed Layout - add class "boxed-layout" to body element of every page
- RTL Layout (Right-to-Left) - add class "rtl" to body element of every page

Change Log:
v 1.4 - 2015/01/18
- Fixed minor bugs on responsive in main css file
- Updated: DropzoneJS to Latest version 3.12.0
- Updated: Dygraphs to Latest version 1.1.0
- Updated: DataTables to Latest version 1.10.4
- Updated: Morris charts to Latest version 0.5.1
- Updated: Summernote to Latest version 0.6.0

v 1.3 - 2014/12/14
- Fix for top menu on "sm" size, which won't collapse

v 1.2 - 2014/12/13
- Fixed paths to Glyphicons in compiled bootstrap file
- Replace of placeholder text accross the theme

v 1.1.1. - 2014/10/17
- Added Sass version
- Added Less version

v 1.1 - 2014/10/11
- More color options / themes - 2 new color themes
- Added Email Layout for Inbox, Detail, Compose
- Added Advanced Data Tables with some great plugins
- Added awesome Dygraphs as new graph option
- Added new Widgets
- Added Notifications
- Added enhanced Modals
- Added X-Editable form option
- Added WYSIWYG Summernote
- Added Gallery version 2 as grid layout
- Added Projects Layout
- Added Team Members Layout
- Added Timeline
- Added Timeline in grid layout
- Added Search results
- Added Tour Layout for intro
- Added Registration page in 2 versions
- Added Forgot password page in 2 versions
- Added Lock screen page in 2 versions
- Added Video implementation with Bootstrap video option
- Added page preploader with Pace library
- Added RTL (Right to left) layout option
- Added Boxed Layout option
- Upgraded Nanoscroller for better functionality in Chrome
- Fixed some layout bugs in theme versions
- Fixed 3rd level menu