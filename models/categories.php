<?php

	class Categories {

		public static function getCategories() {
			return R::findAll("categories");
		}

		public static function display() {
			echo "<nav aria-label='breadcrumb'>";
			echo "<ol class='breadcrumb'>";
			foreach (R::findAll("categories") as $category)
				echo "<li class='breadcrumb-item'><a href='articles.php?category=$category->name'>" . $category->name . "</a></li>";
			echo "</ol>";
			echo "</nav>";
		}

		public static function getCatArticles($category) {
			$cat = R::findOne("categories",' name = ? ', [$category]);
			return $cat->ownArticlesList;
		}



	}
?>
