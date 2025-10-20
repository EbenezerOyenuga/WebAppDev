<?php

  namespace Oop;

    interface Operations {
      public function create();
      public function deposit($amount);
      public function withdraw($amount);
      public function checkBalance();
  }
