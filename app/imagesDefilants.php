
<script>
       var i=0;
       var time=2500;
       var mage=new Array (5);
       mage[0]="im1.jpg";
       mage[1]="im2.jpg";
       mage[2]="im3.jpg";
       mage[3]="im4.jpg";
       mage[4]="im5.PNG";
      

       function changer()
       {
           document.orama.src=mage[i];
           if(i<4)
           {
               i++;
           }
           else
           {
               i=0;
           }
           setTimeout("changer()",time);
       }

       window.onload=changer;

      
       
      
   </script>