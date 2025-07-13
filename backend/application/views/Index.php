<?php
$tempDate = array();
$tempValue = array();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo APP_NAME ?> | Dashboard HAE IPB</title>
  <?php include "includes/include_js_css_new.php"; ?>
  <style type="text/css">
    .dnone {
      display: none;
    }

    .tooltips {
      /*display: inline-block;*/
      background: #ffffff;
      color: #000000;
      padding: 5px 10px;
      width: 140px;
      font-size: 13px;
      border-radius: 4px;
      position: absolute;
      top: -75px;
    }

    .tooltips2 {
      /*display: inline-block;*/
      background: #ffffff;
      color: #000000;
      padding: 5px 10px;
      width: 200px;
      font-size: 13px;
      border-radius: 4px;
      position: absolute;
      top: -90px;
    }

    .arrow,
    .arrow::before {
      position: absolute;
      width: 8px;
      height: 8px;
      background: inherit;
    }

    .arrow {
      visibility: hidden;
    }

    .arrow::before {
      visibility: visible;
      content: '';
      transform: rotate(45deg);
    }

    .overflow-chart {
      overflow-x: auto !important;
      min-width: 800px;
    }

    .labels {
      color: #ffffff;
      background-color: green;
      font-family: Roboto, Arial, sans-serif;
      font-size: 11px;
      font-weight: bold;
      text-align: center;
      width: 28px;
      height: 28px;
      border-radius: 100%;
      padding: 6px 0px;
      border: 1px solid #999;
      box-sizing: border-box;
      white-space: nowrap;
    }

    .labels2 {
      color: #ea4335;
      background-color: yellow;
      font-family: Roboto, Arial, sans-serif;
      font-size: 11px;
      font-weight: bold;
      text-align: center;
      width: 28px;
      height: 28px;
      border-radius: 100%;
      padding: 6px 0px;
      border: 1px solid #999;
      box-sizing: border-box;
      white-space: nowrap;
    }

    .card-container2 {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: flex-start;
    }

    .card2 {
      border: 1px solid #ccc;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: calc(25% - 20px);
      text-align: center;
    }

    .info-bar2 {
      background-color: #f2f2f2;
      border-top: 1px solid #ccc;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border-radius: 0 0 8px 8px;
    }

    .info-column2 {
      flex-basis: 33%;
      text-align: center;
    }

    .info-column2:not(:last-child) {
      border-right: 1px solid #ccc;
    }

    .info-box {
      width: 40px;
      height: 40px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .pagination button {
      margin: 0 5px;
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      background-color: #f2f2f2;
      cursor: pointer;
    }

    .pagination button:hover {
      background-color: #e0e0e0;
    }

    .pagination button.active {
      background-color: blue;
      color: #fff;
    }
  </style>

</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
  <?php include "includes/hidden.php"; ?>

  <?php require("includes/header_new.php"); ?>

  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">

      <?php require("includes/navigation_new.php"); ?>

      <!--begin::Wrapper-->
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

        <?php require("includes/header-top.php"); ?>

        


        <?php include("includes/footer.php"); ?>
        <?php include("includes/popup_alumni.php"); ?>
        <?php include("includes/popup_prov.php"); ?>
      </div>
      <!--end::Wrapper-->
    </div>
  </div>
  <!-- /.content-wrapper -->

  <!--begin::Page Vendors(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/datatables/datatables.bundle.js"></script>
  <!--end::Page Vendors-->
  <!--end::Page Scripts-->

  <script src="<?php echo base_url(); ?>dist/assets/plugins/custom/draggable/draggable.bundle.js" type="text/javascript"></script>

  <!--begin::Page Scripts(used by this page)-->
  <script src="<?php echo base_url(); ?>dist/assets/js/pages/features/cards/draggable.js"></script>

  <script src="<?php echo base_url(); ?>dist/assets/js/pages/features/cards/tools.js"></script>

  <script src="<?php echo base_url(); ?>dist/js/home.js"></script>
  <script src="<?php echo base_url(); ?>dist/js/maps.js"></script>
  <!--end::Page Scripts-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRue8nV1tDiW-YsT6lWFPKfiBLjOQoxMs&callback=initMap" async defer></script>
  <script src="https://unpkg.com/@googlemaps/markerwithlabel/dist/index.min.js"></script>

  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVVSqxxlhct_UCU6GGEpJqAl5fSxTGojc&callback=initMap" async defer></script> -->
  <script>
    const cards = document.querySelectorAll('.card2');
    const cardContainer = document.querySelector('.card-container2');
    const pagination = document.querySelector('.pagination');
    const cardsPerPage = 8;
    let currentPage = 1;

    function showCards(pageNumber) {
      const startIndex = (pageNumber - 1) * cardsPerPage;
      const endIndex = Math.min(startIndex + cardsPerPage, cards.length);

      cards.forEach((card, index) => {
        if (index >= startIndex && index < endIndex) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    }

    function createPaginationButtons() {
      const pageCount = Math.ceil(cards.length / cardsPerPage);

      pagination.innerHTML = '';

      const firstPageButton = createPaginationButton('First', 1);
      pagination.appendChild(firstPageButton);

      const previousPageButton = createPaginationButton('Prev', currentPage - 1);
      pagination.appendChild(previousPageButton);

      let startPage = Math.max(currentPage - 4, 1);
      let endPage = Math.min(currentPage + 4, pageCount);

      if (currentPage <= 4) {
        endPage = Math.min(9, pageCount);
      } else if (currentPage >= pageCount - 4) {
        startPage = Math.max(pageCount - 8, 1);
      }

      for (let i = startPage; i <= endPage; i++) {
        const button = createPaginationButton(i, i);
        pagination.appendChild(button);
      }

      const nextPageButton = createPaginationButton('Next', currentPage + 1);
      pagination.appendChild(nextPageButton);

      const lastPageButton = createPaginationButton('Last', pageCount);
      pagination.appendChild(lastPageButton);

      updatePaginationButtons();
    }

    function createPaginationButton(label, page) {
      const button = document.createElement('button');
      button.textContent = label;
      button.addEventListener('click', () => {
        currentPage = page;
        showCards(currentPage);
        createPaginationButtons(); // Update pagination buttons
      });
      return button;
    }

    function updatePaginationButtons() {
      const buttons = document.querySelectorAll('.pagination button');

      buttons.forEach((button, index) => {
        if (button.textContent === 'First') {
          button.disabled = currentPage === 1;
        } else if (button.textContent === 'Last') {
          button.disabled = currentPage === Math.ceil(cards.length / cardsPerPage);
        } else if (button.textContent === 'Prev') {
          button.disabled = currentPage === 1;
        } else if (button.textContent === 'Next') {
          button.disabled = currentPage === Math.ceil(cards.length / cardsPerPage);
        } else {
          button.disabled = false;
        }

        if (parseInt(button.textContent) === currentPage) {
          button.classList.add('active');
        } else {
          button.classList.remove('active');
        }
      });
    }

    createPaginationButtons();
    showCards(currentPage);
  </script>
</body>

</html>