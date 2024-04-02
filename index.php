<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script type="text/javascript" src="function.js"></script>
  <title>Tour</title>
</head>

<body>
  <div class="container">
    <div class="navigation" id="myHeader">

      <div class="logodiv">
        <a href="#section1" class="link home"><img src="img/logo.png" alt="LOGO" class="logo" />
        </a><a href="#section1" class="link home"><img src="img/logo-des.png" alt="LOGO" class="logo-des" /></a>
      </div>
      <div class="centered-top">
        <table id="chinhneh">
          <tr>
            <td><a href="#sectionTour" class="link navi">Tour</a></td>
            <td><a href="#section2" class="link navi"> About Us</a></td>
            <td><a href="#section3" class="link navi"> Blog</a></td>
            <td>
              <a href="#section4" class="link navi" onclick="openPage(event, 'FAQs');">
                FAQ</a>
            </td>
            <td>
              <a href="#section4" class="link navi" onclick="openPage(event, 'Reviews');">
                Review</a>
            </td>
          </tr>
        </table>
      </div>
      <div class="user-avt"><a href="login.php" class="user-avt">Đăng nhập</a></div>
      <div class="user-avt-lout"><a href="logout.php" class="user-avt">Đăng xuất</a></div>
      <?php if (isset($_SESSION['logged_in'])) { ?>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".user-avt").style.display = "none";
          });
        </script>
      <?php } ?>

      <?php if (!isset($_SESSION['logged_in'])) { ?>
        <script>
          document.addEventListener("DOMContentLoaded", function() {
            document.querySelector(".user-avt-lout").style.display = "none";
          });
        </script>
      <?php } ?>
    </div>

    <script>
      window.onload = getvar();
    </script>
    <!----------------------------------------------Section1------------------------------------------>
    <div class="main" id="section1">
      <div class="mySlides fade">
        <img src="img/page1-1.jpg" alt="background" class="img-background" />
      </div>
      <div class="mySlides fade">
        <img src="img/page1-2.jpg" alt="background" class="img-background" />
      </div>
      <div class="mySlides fade">
        <img src="img/page1-3.jpg" alt="background" class="img-background" />
      </div>
      <div class="mySlides fade">
        <img src="img/page1-4.jpg" alt="background" class="img-background" />
      </div>
      <div class="mySlides fade">
        <img src="img/page1-5.jpg" alt="background" class="img-background" />
      </div>
      <span style="text-align: center" class="dots">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
      </span>
      <div class="top-left"></div>
      <div class="centered">
        <h1 class="title">LIFE</h1>
      </div>
    </div>
    <script>
      showSlides(slideIndex);
      autoSlide();
    </script>
    <!----------------------------------------------SectionTour------------------------------------------>
    <div class="main" id="sectionTour">
      <div class="header">OUR <span id="tour-header">TOUR</span></div>
      <div class="tour-slider">
        <div class="list-y slider">
        </div>
        <a href="#section0" class="prev1 previous button ">&#8249;</a>
        <a href="#section0" class="next1 next button ">&#8250;</a>
      </div>
      <div class="tour-content">
        <div class="box1">
          <div class="tour-img"><img src="img/img-food1.jpg" alt="Hinh neh" class="tour-img img food"></div>
          <div class="tour-info-header">FOOD</div>
          <div class="tour-info-text"></div>
        </div>
        <div class="box1">
          <div class="tour-img"><img src="img/img-history1.jpg" alt="Hinh neh" class="tour-img img history"></div>
          <div class="tour-info-header ">HISTORY</div>
          <div class="tour-info-text"></div>
        </div>
        <div class="box1">
          <div class="tour-img"><img src="img/img-sport1.jpg" alt="Hinh neh" class="tour-img img sport"></div>
          <div class="tour-info-header">SPORT</div>
          <div class="tour-info-text"></div>
        </div>
      </div>
    </div>
    <?php
    if (isset($_SESSION['logged_in'])) {
      echo '<script>';
      echo 'display_addTour();';
      echo '</script>';
    }
    ?>
    <div class="rm-add-tour">
      <div class="tour-form">
        <div class="tour-form-add">
          <h2 class="add-tour-header">Add Tour</h2>
          <form id="tourForm" action="" method="post">
            <label for="tourTextVi">Nội dung Tiếng Việt:</label><br>
            <textarea id="tourTextVi" name="tourTextVi" rows="5" cols="30"></textarea><br>

            <label for="reviewImageVi">Ảnh:</label><br>
            <input type="file" id="reviewImageVi" name="reviewImageVi" accept="image/*"><br><br>

            <label for="reviewTextFr">Nội dung Tiếng Pháp:</label><br>
            <textarea id="reviewTextFr" name="reviewTextFr" rows="5" cols="30"></textarea><br>

            <label for="reviewImageFr">Ảnh: </label><br>
            <input type="file" id="reviewImageFr" name="reviewImageFr" accept="image/*"><BR><BR>

            <input type="submit" value="THÊM" onclick="addTour('Cần Thơ');">
          </form>
        </div>
        <div class="tour-form-rm">
          <h2 class="add-tour-header">Remove Tour</h2>
          <button id="closeTourform" onclick="closeTourform()">Đóng</button>
          <div class="tour-lists">
          </div>
        </div>
      </div>
    </div>
    <?php
    include 'connection.php';
    $sql = "SELECT * FROM tour";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<script>";
        echo "addTourfisrt(" . '"' . $row["tour_name"] . '"' . "," . $row["tour_id"] . ")";
        echo "</script>";
      }
    }
    $sql = "SELECT * FROM tour_detail";
    $result = $conn->query($sql);
    $tour = [];
    $tmp_pw = "";
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<script>";
        echo "displayTour_food(" . 1 . "," . '"' . $row["td_des"] . '"' . ");";
        echo "document.querySelector(" . '"' . "." . "item"   . "." . "item" .  $row['tour_id'] . '"' . ")" . "." . "onclick = function () {displayTour_food(" . $row['tour_id'] . "," . '"' . $row["td_des"] . '"' . ")};";
        echo "</script>";
      }
    }


    ?>
    <!----------------------------------------------Section2------------------------------------------>
    <div class="main" id="section2">
      <img src="img/page1-5.jpg" class="img-section-left" />
      <div class="text-summarize-right">
        <h1>
          <center>ABOUT US</center>
        </h1>
        <BR>
        <p>Chúng em - những sinh viên trẻ của ngành Ngôn ngữ Pháp đã cùng nhau lên ý tưởng và thành lập dự án “Le “ với mong muốn tạo ra một môi trường để vận dụng và trao đổi ngôn ngữ Pháp, tạo thêm việc làm cho các bạn sinh viên cùng ngành cũng như là quảng bá những giá trị xã hội của con người và giá trị du lịch của địa phương.
        </p>
      </div>
    </div>
    <!----------------------------------------------Section3------------------------------------------>
    <div class="main" id="section3">
      <img src="img/page1-5.jpg" class="img-section-right" />
      <div class="text-summarize-left">
        <h1>
          <center>OUR BLOGS</center>
        </h1>
        <BR>
        <p>------------------------------------------</p>
      </div>
    </div>
    <!----------------------------------------------Section4------------------------------------------>
    <div class="main" id="section4">
      <div class="tab">
        <div class="headFAQ">
          <h2>FREQUENTLY ASKED QUESTION(s)</h2>
        </div>
        <div class="headReview">
          <h2>WHAT DO OUR CUSTOMERS SAY?</h2>
        </div>
        <button class="tablinks" onclick="openPage(event, 'FAQs');" id="defaultOpen">
          FAQs
        </button>
        <button class="tablinks" onclick="openPage(event, 'Reviews');">
          Reviews
        </button>
      </div>
      <div id="FAQs" class="tabcontent">
        <div class="contentFAQ">
          <div class="question-container">
            <div class="question">Tôi có thể thanh toán bằng hình thức nào ?</div>
            <img src="img/down-arow.png" class="arrow-down" />
          </div>
          <div class="answer-container">
            <div class="answer">Sau khi đã thống nhất lịch trình tour, chúng tôi sẽ gửi email cho bạn trong vòng 03 ngày về cách thức thanh toán trực tiếp cho tour bạn đã đặt. Vui lòng hãy check email của bạn thường xuyên và chắc chắn rằng bạn không bỏ lỡ thông tin nào về chuyến đi.</div>
          </div>

          <div class="question-container">
            <div class="question">Tôi có thể tips cho hướng dẫn viên của mình ?</div>
            <img src="img/down-arow.png" class="arrow-down" />
          </div>
          <div class="answer-container">
            <div class="answer">Tiền boa là không bắt buộc. Động lực của chúng tôi là trải nghiệm của bạn. Nếu bạn hài lòng dịch vụ được cung cấp, tiền boa sẽ là hình thức đánh giá cao. Ngoài ra, lời nhận xét của bạn sẽ được coi là hoạt động đóng góp của tổ chức chúng tôi. Vui lòng thông báo ngay cho chúng tôi nếu bạn có bất kì thắc mắc nào về khoản phí trong tour.</div>
          </div>

          <div class="question-container">
            <div class="question">Tôi có thể thay đổi thời gian của tour đã đặt ? </div>
            <img src="img/down-arow.png" class="arrow-down" />
          </div>
          <div class="answer-container">
            <div class="answer">
              Bạn hoàn toàn có thể thay đổi theo thời gian bạn muốn nếu như không có lịch trình nào đã được đặt trước vào thời gian đó. Tuy nhiên bạn phải thông báo càng sớm càng tốt để chúng tôi có thể chuẩn bị tốt cho chuyến đi của bạn.
            </div>
          </div>
          <div class="question-container">
            <div class="question">Tôi có thể huỷ tour đã đặt ?</div>
            <img src="img/down-arow.png" class="arrow-down" />
          </div>
          <div class="answer-container">
            <div class="answer">
              Bạn hoàn toàn có thể huỷ tour đã đặt. Vui lòng hãy thông báo cho chúng tôi càng sớm càng tốt hẹn gặp lại bạn trong một tour khác!
            </div>
          </div>
          <div class="question-container">
            <div class="question">Tổ chức có chương trình khuyến mãi nào không ?</div>
            <img src="img/down-arow.png" class="arrow-down" />
          </div>
          <div class="answer-container">
            <div class="answer">
              Rất tiếc chúng tôi chưa triển khai các chương trình khuyến mãi. Thay vào đó, chúng tôi sẽ thêm vào nhiều địa điểm (không tính phí dịch vụ) vào các dịp lễ hoặc sự kiện lớn của thành phố </div>
          </div>
        </div>
      </div>

      <div id="Reviews" class="tabcontent">

        <div class="list-x slider">
          <div class="item item1">
            <img src="img/seulgi-avt.jpeg" alt="seulgi nek!" class="img-avt" />
            <div class="text-review">
              <q>Bienvenue dans le monde du voyage, où chaque pas est une découverte et chaque rencontre une aventure.</q>
            </div>
            <div class="name-reviewer">Kang<br />Seulgi</div>
            <div class="note-reviewer">Découvrez le monde, une aventure à chaque coin de rue.</div>
          </div>
          <div class="item item2">
            <img src="img/irene-avt.jpg" alt="irene nek!" class="img-avt" />
            <div class="text-review">
              <q>Bienvenue dans le monde du voyage, où chaque pas est une découverte et chaque rencontre une aventure.</q>
            </div>
            <div class="name-reviewer">Bae<br />Juhuyn</div>
            <div class="note-reviewer">Découvrez le monde, une aventure à chaque coin de rue</div>
          </div>
          <div class="item item3">
            <img src="img/seulrene-avt.jpg" alt="seulrene nek!" class="img-avt" />
            <div class="text-review">
              <q>Bienvenue dans le monde du voyage, où chaque pas est une découverte et chaque rencontre une aventure.</q>
            </div>
            <div class="name-reviewer">Bae<br />Seulgi</div>
            <div class="note-reviewer">Découvrez le monde, une aventure à chaque coin de rue</div>
          </div>
          <?php
          if (isset($_SESSION['logged_in'])) {
            echo '<div class="item item-hem" onclick="openModal()"> </div>';
          }
          ?>
        </div>
        <a href="#section0" class="prev2 previous button ">&#8249;</a>
        <a href="#section0" class="next2 next button ">&#8250;</a>
      </div>
    </div>
  </div>
  <div id="modal">
    <div id="modal-content">
      <button id="closeModal" onclick="closeModal()">Đóng</button>
      <h2>Thêm Review Mới</h2>
      <form id="reviewForm" action="save_review.php" method="post">
        <label for="reviewTextVi">Nội dung Review Tiếng Việt:</label><br>
        <textarea id="reviewTextVi" name="reviewTextVi" rows="5" cols="30"></textarea><br>

        <label for="reviewerNameVi">Tên khách hàng:</label><br>
        <input type="text" id="reviewerNameVi" name="reviewerNameVi"><br>

        <label for="reviewerCommentVi">Chú thích khách hàng:</label><br>
        <input type="text" id="reviewerCommentVi" name="reviewerCommentVi"><br>

        <label for="reviewImageVi">Ảnh khách hàng:</label><br>
        <input type="file" id="reviewImageVi" name="reviewImageVi" accept="image/*"><br><br>

        <label for="reviewTextFr">Nội dung Review Tiếng Pháp:</label><br>
        <textarea id="reviewTextFr" name="reviewTextFr" rows="5" cols="30"></textarea><br>

        <label for="reviewerNameFr">Tên khách hàng:</label><br>
        <input type="text" id="reviewerNameFr" name="reviewerNameFr"><br>

        <label for="reviewerCommentFr">Chú thích khách hàng:</label><br>
        <input type="text" id="reviewerCommentFr" name="reviewerCommentFr"><br>

        <label for="reviewImageFr">Ảnh khách hàng:</label><br>
        <input type="file" id="reviewImageFr" name="reviewImageFr" accept="image/*"><BR><BR>

        <input type="submit" value="THÊM">
      </form>
    </div>
  </div>

</body>
<script>
  window.onload = startListen();
  window.onscroll = function() {
    myFunction()
  };
  window.onload = display_rmTours();
</script>

</html>