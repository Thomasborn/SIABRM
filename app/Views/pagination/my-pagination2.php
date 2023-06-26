<div class="pagination2 ml-auto">
    <!-- <li class="page-item2 previous-page2 disable"><a href="#" class="page-link2">Prev</a></li>
    <li class="page-item2 current-page2 active"><a href="#" class="page-link2">1</a></li>
    <li class="page-item2 dots2"><a href="#" class="page-lin2k">...</a></li>
    <li class="page-item2 current-page2"><a href="#" class="page-link2">5</a></li>
    <li class="page-item2 current-page2"><a href="#" class="page-link2">6</a></li>
    <li class="page-item2 dots2"><a href="#" class="page-link2">...</a></li>
    <li class="page-item2 current-page2"><a href="#" class="page-link2">10</a></li>
    <li class="page-item2 next-page2"><a href="#" class="page-link2">Prev</a></li> -->
</div>

<script type="text/javascript">
    function getPageList2(totalPages2, page2, maxLength2) {
        function range2(start2, end2) {
            return Array.from(Array(end2 - start2 + 1), (_, i2) => i2 + start2);
        }

        var sideWidth2 = maxLength2 < 9 ? 1 : 2;
        var leftWidth2 = (maxLength2 - sideWidth2 * 2 - 3) >> 1;
        var rightWidth2 = (maxLength2 - sideWidth2 * 2 - 3) >> 1;

        if (totalPages2 <= maxLength2) {
            return range2(1, totalPages2);
        }

        if (page2 <= maxLength2 - sideWidth2 - 1 - rightWidth2) {
            return range2(1, maxLength2 - sideWidth2 - 1).concat(0, range2(totalPages2 - sideWidth2 + 1, totalPages2));
        }

        if (page2 >= totalPages2 - sideWidth2 - 1 - rightWidth2) {
            return range2(1, sideWidth2).concat(0, range2(totalPages2 - sideWidth2 - 1 - rightWidth2 - leftWidth2, totalPages2));
        }

        return range2(1, sideWidth2).concat(0, range2(page2 - leftWidth2, page2 + rightWidth2), 0, range2(totalPages2 - sideWidth2 + 1, totalPages2));
    }

    $(function() {
        var numberOfItems2 = $(".card-content2 .card2").length;
        var limitPerPage2 = 5; //How many card items visible per a page
        var totalPages2 = Math.ceil(numberOfItems2 / limitPerPage2);
        var paginationSize2 = 7; //How many page elements visible in the pagination
        var currentPage2;

        function showPage2(whichPage2) {
            if (whichPage2 < 1 || whichPage2 > totalPages2) return false;

            currentPage2 = whichPage2;

            $(".card-content2 .card2").hide().slice((currentPage2 - 1) * limitPerPage2, currentPage2 * limitPerPage2).show();

            $(".pagination2 li").slice(1, -1).remove();

            getPageList2(totalPages2, currentPage2, paginationSize2).forEach(item2 => {
                $("<li>").addClass("page-item2").addClass(item2 ? "current-page2" : "dots2")
                    .toggleClass("active", item2 === currentPage2).append($("<a>").addClass("page-link2")
                        .attr({
                            href: "javascript:void(0)"
                        }).text(item2 || "...")).insertBefore(".next-page2");
            });

            $(".previous-page2").toggleClass("disable", currentPage2 === 1);
            $(".next-page2").toggleClass("disable", currentPage2 === totalPages2);
            return true;
        }

        $(".pagination2").append(
            $("<li>").addClass("page-item2").addClass("previous-page2").append($("<a>").addClass("page-link2").attr({
                href: "javascript:void(0)"
            }).text("Prev")),
            $("<li>").addClass("page-item2").addClass("next-page2").append($("<a>").addClass("page-link2").attr({
                href: "javascript:void(0)"
            }).text("Next"))
        );

        $(".card-content2").show();
        showPage2(1);

        $(document).on("click", ".pagination2 li.current-page2:not(.active)", function() {
            return showPage2(+$(this).text());
        });

        $(".next-page2").on("click", function() {
            return showPage2(currentPage2 + 1);
        });

        $(".previous-page2").on("click", function() {
            return showPage2(currentPage2 - 1);
        });
    });
</script>