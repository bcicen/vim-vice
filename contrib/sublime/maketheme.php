#!/usr/bin/php
<?php

   function COL($fg = null, $bg = null, $style = null) {

      return [
         'foreground' => $fg,
         'background' => $bg,
         'fontStyle'  => $style,
      ];
   }

   function toXml($scope, $props) {

      $szRet = sprintf('
      <dict>
         <key>scope</key>
         <string>%s</key>
         <key>settings</key>
         <dict>', $scope);

      foreach( $props as $key => $val ) {

         if( $val !== null ) {

            $szRet .= sprintf('
            <key>%s</key>
            <string>%s</key>', $key, $val);
         }
      }

      $szRet .= '         </dict>
      </dict>';

      return $szRet;
   }

$white         = '#FFFFFF';
$grey0         = '#878787'; // lightest grey
$grey1         = '#444444'; // mid grey
$grey2         = '#181818'; // darkest grey
$pink          = '#FF87D7';
$light_pink    = '#FFAFD7';
$hot_pink      = '#FF00FF';
$red           = '#FF005F';
$teal          = '#87FFFF';
$light_blue    = '#AFFFFF';
$light_yellow  = '#FFFFAF';
$mint          = '#AFFFD7';
$dark_mint     = '#00FFAF';
$lavender      = '#D7AFFF';
$gray_purple   = '#AFAFD7';
$dark_lavender = '#875FAF';
$black         = '#000000';

// https://www.sublimetext.com/docs/3/color_schemes.html
// http://www.sublimetext.com/docs/3/scope_naming.html

$arSettings = [
   'caret'                     => $dark_mint,
   'background'                => $grey2,
   'foreground'                => $white,
   'gutter'                    => $grey2,
   'gutterForeground'          => $grey0,
   'selection'                 => $grey1,
   'selectionBorder'           => $gray_purple,
   'invisibles'                => '#ABCDEF',
   'lineHighlight'             => $hot_pink . '28',
   'highlight'                 => $hot_pink,
   'findHighlight'             => $light_yellow,
   'findHighlightForeground'   => $black,
   'accent'                    => $hot_pink,
   'guide'                     => $grey1,
   'activeGuide'               => $white,
   'stackGuide'                => $teal,
   'bracketsForeground'        => $light_yellow,
   'bracketContentsForeground' => $light_yellow,
   'bracketsOptions'           => 'underline',
   'bracketContentsOptions'    => 'underline',
   'tagsOptions'               => 'stippled_underline',

];

$arParts = [
   'entity.name'                        => COL($white, null, null),
   'entity.other.inherited-class'       => COL($white, null, null),
   'entity.name.section'                => COL($white, null, null),
   'entity.name.tag'                    => COL($white, null, null),
   'entity.other.attribute-name'        => COL($white, null, null),

   'variable'                           => COL($white, null, null),
   'variable.parameter'                 => COL($white, null, null),
   'variable.function'                  => COL($white, null, null),
   'support.function'                   => COL($teal, null, null),
   'punctuation.definition.variable'    => COL($light_pink, null, null),

   'constant'                           => COL($mint, null, null),
   'constant.language'                  => COL($mint, null, null),
   'constant.numeric'                   => COL($mint, null, null),
   'constant.character.escape'          => COL($dark_mint, null, null),
   'string'                             => COL($light_yellow, null, null),
   'string.unquoted'                    => COL($white, null, null),

   'meta.function.parameters'           => COL($teal, null, null), // param types
   'storage.type'                       => COL($teal, null, null), // types
   'storage.modifier'                   => COL($dark_mint, null, null), // public, private, etc.

   // CLASS NAME
   'support.class'                      => COL($white, null, null),

   'keyword'                            => COL($gray_purple, null, null),
   'keyword.control'                    => COL($light_blue, null, null),
   'keyword.operator'                   => COL($light_blue, null, null),
   'keyword.operator.assignment'        => COL($light_pink, null, null),

   'comment'                            => COL($white, $grey1 . '35', 'bold italic'),
   'punctuation.definition.comment'     => COL($dark_mint, null, 'bold'),

   'invalid'                            => COL($white, $hot_pink, null),

   'punctuation'                         => COL($pink, null, null),
   'punctuation.separator'               => COL($white, null, null),
   'punctuation.separator.continuation'  => COL($white, null, null),
   'punctuation.terminator'              => COL($white, null, null),
   'punctuation.accessor'                => COL($mint, null, null),
   'punctuation.definition.string.begin' => COL($white, null, null),
   'punctuation.definition.string.end'   => COL($white, null, null),

   // JSON
   'meta.structure.dictionary.key string' => COL($light_yellow),
   //'meta.structure.dictionary.value string' => COL($hot_pink, null, null),

   // HTML / CSS
   'entity.name.tag'                     => COL($light_blue),
   'entity.other.attribute-name'         => COL($white),
   'support.type.property-name.css'      => COL($light_pink),
   'support.constant.property-value.css' => COL($white),

];

$xmlParts = '';

foreach( $arParts as $scope => $color ) {

   $xmlParts .= toXml($scope, $color);
}

$xmlSettings = '';

foreach( $arSettings as $key => $val ) {

   $xmlSettings .= sprintf('            <key>%s</key>
            <string>%s</string>
', $key, $val);
}

echo <<<THIS_IS_THE_THEME
<?xml version="1.0" encoding="UTF-8"?>

<!-- Sublime VICE Theme v1.0.0
#
# https://github.com/bcicen/vim-vice
#
# Copyright 2018-present, All rights reserved
#
# Code licensed under the MIT license
#
# Original vim-vice theme by Bradley Cicenas bradley[at]vektor.nyc
#
-->

<!DOCTYPE plist PUBLIC "-//Apple Computer//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
<plist version="1.0">
<dict>
   <key>name</key>
   <string>VICE</string>
   <key>settings</key>
   <array>
      <dict>
         <key>settings</key>
         <dict>
{$xmlSettings}
         </dict>
      </dict>
      {$xmlParts}
   </array>
   <key>uuid</key>
   <string>AF285292-7A98-4339-A1A8-257F162DEA6F</string>
   <key>colorSpaceName</key>
   <string>sRGB</string>
   <key>semanticClass</key>
   <string>theme.VICE</string>
   <key>author</key>
   <string>vim-vice theme Bradley Cicenas 2016.  Sublime conversion Jason Stewart 2018.</string>
</dict>
</plist>

THIS_IS_THE_THEME;

