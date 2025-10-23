<?php

namespace Oop;

trait Rand{
      function rand_id()
      {
        return \uniqid();
      }

      function rand_account_number()
      {
        return \rand(1000000000,9999999999);
      }
  }