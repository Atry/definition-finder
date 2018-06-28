<?hh // strict
/*
 *  Copyright (c) 2015-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace Facebook\DefinitionFinder;

use namespace Facebook\HHAST;

class TreeParser extends BaseParser {
  protected ScannedScope $defs;

  private function __construct(string $path) {
    $scopes = vec[];

    $rdi = new \RecursiveDirectoryIterator($path);
    $rii = new \RecursiveIteratorIterator($rdi);
    foreach ($rii as $info) {
      if (!$info->isFile()) {
        continue;
      }
      if (!$info->isReadable()) {
        continue;
      }
      $ext = $info->getExtension();
      if ($ext !== 'php' && $ext !== 'hh' && $ext !== 'xhp') {
        continue;
      }
      $parser = FileParser::fromFile($info->getPathname());
      $scopes[] = $parser->defs;
    }

    $this->defs = merge_scopes(
      HHAST\Missing(),
      shape(
        'filename' => '__TREE__',
        'sourceType' => SourceType::MULTIPLE_FILES,
      ),
      $scopes,
    );
  }

  public static function FromPath(string $path): TreeParser {
    return new TreeParser($path);
  }
}
