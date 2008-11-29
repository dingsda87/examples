<?php
   /**
   *  <!--
   *  This file is part of the adventure php framework (APF) published under
   *  http://adventure-php-framework.org.
   *
   *  The APF is free software: you can redistribute it and/or modify
   *  it under the terms of the GNU Lesser General Public License as published
   *  by the Free Software Foundation, either version 3 of the License, or
   *  (at your option) any later version.
   *
   *  The APF is distributed in the hope that it will be useful,
   *  but WITHOUT ANY WARRANTY; without even the implied warranty of
   *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   *  GNU Lesser General Public License for more details.
   *
   *  You should have received a copy of the GNU Lesser General Public License
   *  along with the APF. If not, see http://www.gnu.org/licenses/lgpl-3.0.txt.
   *  -->
   */

   import('modules::usermanagement::biz','umgtManager');
   import('tools::html::taglib::documentcontroller','iteratorBaseController');


   class list_controller extends iteratorBaseController
   {

      function list_controller(){
      }

      function transformContent(){

         $T = &Singleton::getInstance('benchmarkTimer');
         $T->start('getPagedUserList()');
         $uM = &$this->__getServiceObject('modules::usermanagement::biz','umgtManager');
         $UserList = $uM->getPagedUserList();
         $T->stop('getPagedUserList()');

         $Iterator__User = &$this->__getIterator('User');
         $Iterator__User->fillDataContainer($UserList);
         $Iterator__User->transformOnPlace();

       // end function
      }

    // end class
   }
?>