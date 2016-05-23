# _Prllx

# Présentation

_Prllx est un theme builder basé sur le starter thème [FutureImperfect](https://github.com/Palisanka/FutureImperfect)

_Prllx ajoute :
* widget Prllx Controller qui permet la [manipulation de scène](http://scrollmagic.io/examples/basic/scene_manipulation.html)
* la section Prllx dans le customizer qui créé des [Parallax Sections](http://scrollmagic.io/examples/advanced/parallax_sections.html)
* Intégration des plugins de Site Origin : [page builder](https://siteorigin.com/page-builder/), [Css Editor](https://siteorigin.com/css/), [Widget Bunble](https://wordpress.org/plugins/so-widgets-bundle/)

# Organisation

## Widget Prllx Controller

Fichier inc/prllx.php

Le widget peut être intégrer dans n'importe quel sidebar.
Utilisation minimale:
* Nom de l'effet : paramètre Gsap TweenMax.to tel qu'une prop css : "rotation" (default), "x", "width", "scaleX"... ou même des prop css directement tel que : `css:{top:"20px", backgroundColor:"#FF0000"}`
* Id ou classe : selecteur de l'élément à animer
* penser à activer les indicateurs (true) pour la création et les désactiver pour la publication

## Customizer Prllx Section  
Fichiers inc/prllx_customizer.php et inc/typo_customizer.php

La section "Prllx" dans le customizer créé des sections parallax, la page doit être associé au modèle page_prllx_section_full.php lors de la création de la page.

(to do : intégrer le code dans un widget plutôt que customizer+modèle)

## Customizer Prllx Typo

Fichiers inc/typo_customizer.php et assets/prllx/prllx.php

La feuille de style est prllx.php, elle est dynamique et les styles ne sont donc pas intégré dans le `<html style="">`

# Licence

[CC 4.0](http://creativecommons.org/licenses/by/4.0/)

# Credits
* [ScrollMagic](http://scrollmagic.io/)
* [GSAP](greensock.com)
* [skel](https://twitter.com/n33co)
