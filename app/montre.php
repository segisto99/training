 <table bgcolor="#456f93" style="margin-left:40%;border:solid 5px white">
            <tr>
               <td>
                  <form name="yoo" >
                     <input type="text" name="datee" style="width:290px;height:20px;font-size:22px;color:white;background-color:#294257 ">
                  </form>
                     <script>
                         function tikitaka()
                         {
                            var wtd=new Date();
                            document.yoo.datee.value=" "+wtd;
                            document.yoo.datee.blur();
                            setTimeout("tikitaka()",1000);
                         } 
                         tikitaka();          
                     </script>
                  </form>
               </td>
            </tr>
       </table>