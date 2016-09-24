<?hh // strict
/*
 *  Copyright (c) 2015, Facebook, Inc.
 *  All rights reserved.
 *
 *  This source code is licensed under the BSD-style license found in the
 *  LICENSE file in the root directory of this source tree. An additional grant
 *  of patent rights can be found in the PATENTS file in the same directory.
 *
 */

namespace Facebook\DefinitionFinder;

// Composer can't autoload these, so put them all in one file that we tell
// composer to always autoload

type SourcePosition = shape(
  'filename' => string,
  'line' =>  ?int,
);

type AttributeMap = Map<string, Vector<mixed>>;

enum VisibilityToken: int {
  T_PUBLIC = T_PUBLIC;
  T_PRIVATE = T_PRIVATE;
  T_PROTECTED = T_PROTECTED;
}

enum VarianceToken: string {
  COVARIANT = '+';
  INVARIANT = '';
  CONTRAVARIANT = '-';
}

enum RelationshipToken: string {
  SUBTYPE = 'as';
  SUPERTYPE = 'super';
}

enum StaticityToken: string {
  IS_STATIC = 'static';
  NOT_STATIC = '';
}

enum AbstractnessToken: string {
  IS_ABSTRACT = 'abstract';
  NOT_ABSTRACT = '';
}

enum FinalityToken: string {
  IS_FINAL = 'final';
  NOT_FINAL = '';
}

const int T_SELECT = 422;
const int T_SHAPE = 402;
const int T_ON = 415;
const int T_DICT = 442;
const int T_VEC = 443;
const int T_KEYSET = 444;

enum StringishTokens: int {
  T_STRING = T_STRING;
  T_SELECT = T_SELECT;
  T_ON = T_ON;
  T_DICT = T_DICT;
  T_VEC = T_VEC;
  T_KEYSET = T_KEYSET;
}
