<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./html/css/homestyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/b0c45caebd.js" crossorigin="anonymous"></script>
</head>

<script src="https://kit.fontawesome.com/b0c45caebd.js" crossorigin="anonymous"></script>
<body >
    <div class="container">
    <div class="logoicon"><a href="<?=$BASE_URL?>">Mother Playlist</a></div>
        
      </div>
    <form method="post" action="functions/child.php" style="margin-inline: 10%; margin-top: 100px;">
        <input type="hidden" value="<?=$_GET['code']?>" name="code" required>
        <input type="hidden" value="<?=$refreshToken?>" name="refresh" required>

        <!-- <input type="text" name="motherlink" placeholder="Mother Playlist Link (max. 1000)" required><br/> -->

        <div class="custom-select" >
            <select name="motherlink" required>
                <option selected>⬇ Select the Mother's Playlist</option>
                <?php foreach($playlists as $id=>$playlist):?>
                    <option value="<?=$id?>"><?=$playlist?></option>
                <?php endforeach?>
            </select>
        </div>

        <div style="display: flex; flex-wrap:wrap">
        <input type="text" name="number" placeholder="Number of Songs for the Child" required>
        </div>
        <!-- <input type="text" name="childlink" placeholder="Child Playlist Link" required><br/> -->

        <div class="custom-select" >
            <select name="childlink" required>
                <option selected>⬇ Select the Child's Playlist</option>
                <?php foreach($playlists as $id=>$playlist):?>
                    <option value="<?=$id?>"><?=$playlist?></option>
                <?php endforeach?>
            </select>
        </div>

        <div class="lastrow"> <button type="submit">Give Birth</button> You MUST own both playlists.</div>
    </form>

<script>
    
var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /* For each element, create a new DIV that will act as the selected item: */
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /* For each element, create a new DIV that will contain the option list: */
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /* For each option in the original select element,
    create a new DIV that will act as an option item: */
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /* When an item is clicked, update the original select box,
        and the selected item: */
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
    /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
    e.stopPropagation();
    closeAllSelect(this);
    this.nextSibling.classList.toggle("select-hide");
    this.classList.toggle("select-arrow-active");
  });
}

function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);

</script>
</body>
</html>