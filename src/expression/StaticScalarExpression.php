<?hh // strict
/*
 *  Copyright (c) 2015-present, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the MIT license found in the
 *  LICENSE file in the root directory of this source tree.
 *
 */

namespace Facebook\DefinitionFinder\Expression;

use namespace Facebook\HHAST;

final class StaticScalarExpression extends Expression<mixed> {
  const type TNode = HHAST\EditableNode;
  <<__Override>>
  protected static function matchImpl(
    HHAST\EditableNode $n,
  ): ?Expression<mixed> {
    return LiteralExpression::match($n);
  }
}
