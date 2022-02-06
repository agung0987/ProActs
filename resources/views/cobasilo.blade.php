// edit file resources/views/contact.blade.php
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
    <form action ="{{ route('proses_edit') }}" method ="POST">
     @csrf
    <?php
    for($i=1;$i<=5;$i++)
    {
        ?>
        
           Name
           <input type="text" name="name[]"  value="ytesdt"/>
        
           Email
           <input type="email" name="email[] "  value="ytesdt@g.co"/>
        
           Message
           <textarea name="message[]">teest texrtarea</textarea>
        <div class="well well-sm">
            <div class="radio">
                <label>
                <input type="radio" name="optradio[<?php echo $i; ?>]" value="a">Option 1</label>
            </div>
            <div class="radio">
                <label>
                <input type="radio" name="optradio[<?php echo $i; ?>]" value="b">Option 2</label>
            </div>
            <div class="radio">
                <label>
                <input type="radio" name="optradio[<?php echo $i; ?>]" value="c">Option 3</label>
            </div>
        </div>

        ==============================================================================
        <br>
        <?php
    }
    ?>
    <button type="submit" class="btn btn-success" name="submit">Finish</button>
        </tr>
     </table>
  </form>
</body>
</html>