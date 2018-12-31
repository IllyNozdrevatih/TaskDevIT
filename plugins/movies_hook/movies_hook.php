<?php
/*
Plugin Name: Хук на тип записей Фильмы
Plugin URI: http://страница_с_описанием_плагина_и_его_обновлений
Description: Выводит мета поля и таксномии фильмов.
Version: 1.0
Author: Nozdrevatih
Author URI: http://страница_автора_плагина
*/

add_action('the_content','add_moives_taxonomy');
add_action('the_excerpt','add_moives_taxonomy_to_page_template');

function add_moives_taxonomy($content){
	if (is_singular('movies')) {
		$post_id = get_the_ID();
		
		$ganres = get_the_terms($post_id,'movies_genres');
		$countries = get_the_terms($post_id,'movies_countries');
		$years = get_the_terms($post_id,'movies_year');
		$actors = get_the_terms($post_id,'movies_actors');

		$price = get_post_meta($post_id,'Стоимость сеанса');
		$release_date = get_post_meta($post_id,'Дата выхода');


		$post_ganre_array = [];
		$post_countries_array = [];
		$post_years_array = [];
		$post_actors_array = [];


		if (!empty($ganres)) {
			foreach ($ganres as $ganre) {
				array_push($post_ganre_array, $ganre->name);
			}
		} else {
			$post_ganre_array = array('Не указано');
		}
		
		if (!empty($countries)) {
			foreach ($countries as $country) {
				array_push($post_countries_array, $country->name);
			}
		} else {
			$post_countries_array = array('Не указан');
		}

		if (!empty($years)) {
			foreach ($years as $year) {
				array_push($post_years_array, $year->name);
			}
		} else {
			$post_years_array = array('Не указано');
		}

		if (!empty($actors)) {
			foreach ($actors as $actor) {
				array_push($post_actors_array, $actor->name);
			}
		} else {
			$post_actors_array = array('Не указано');
		}

		if (empty($price[0])) {
			$price[0] = 'Не указана';
		}

		if (empty($release_date[0])) {
			$release_date[0] = 'Не указана';
		}


		$post_ganres = implode(',',$post_ganre_array);
		$post_countries = implode(',',$post_countries_array);
		$post_years = implode(',',$post_years_array);
		$post_actors = implode(',',$post_actors_array);


		$film_info = '
			<p><i class="fas fa-calendar-alt fa-lg"></i> Год : '.$post_years.'</p>
			<p><i class="fas fa-flag fa-lg""></i> Страна : '.$post_countries.'</p>
			<p><i class="fas fa-filter fa-lg""></i> Жанр : '.$post_ganres.'</p>
			<p><i class="fas fa-users fa-lg""></i> Актеры : '.$post_actors.'</p>
		';

		$film_footer_info = '
			<div class="row">
				<div class="col-md-6"><label class = "meta-field"><i class="fas fa-coins fa-lg"></i> Стоимость сеанса  '.$price[0].'</label></div>
				<div class="col-md-6"><label class = "meta-field"><i class="fas fa-door-open fa-lg""></i> Дата выхода  '.$release_date[0].'</small></label></div>
			</div>
		';

		if (is_page_template( 'templates/bootstrap-elems.php')){
			return $film_info.$content.$film_footer_info;
		}
		return '<div style="moive-block">'.$film_info.$content.'</div>'.$film_footer_info;
	};

	return $content;
}


function add_moives_taxonomy_to_page_template($content){
	if (is_page_template( 'templates/bootstrap-elems.php')) {
		$post_id = get_the_ID();
		
		$ganres = get_the_terms($post_id,'movies_genres');
		$countries = get_the_terms($post_id,'movies_countries');
		$years = get_the_terms($post_id,'movies_year');
		$actors = get_the_terms($post_id,'movies_actors');

		$price = get_post_meta($post_id,'Стоимость сеанса');
		$release_date = get_post_meta($post_id,'Дата выхода');


		$post_ganre_array = [];
		$post_countries_array = [];
		$post_years_array = [];
		$post_actors_array = [];


		if (!empty($ganres)) {
			foreach ($ganres as $ganre) {
				array_push($post_ganre_array, $ganre->name);
			}
		} else {
			$post_ganre_array = array('Не указано');
		}
		
		if (!empty($countries)) {
			foreach ($countries as $country) {
				array_push($post_countries_array, $country->name);
			}
		} else {
			$post_countries_array = array('Не указан');
		}

		if (!empty($years)) {
			foreach ($years as $year) {
				array_push($post_years_array, $year->name);
			}
		} else {
			$post_years_array = array('Не указано');
		}

		if (!empty($actors)) {
			foreach ($actors as $actor) {
				array_push($post_actors_array, $actor->name);
			}
		} else {
			$post_actors_array = array('Не указано');
		}

		if (empty($price[0])) {
			$price[0] = 'Не указана';
		}

		if (empty($release_date[0])) {
			$release_date[0] = 'Не указана';
		}


		$post_ganres = implode(',',$post_ganre_array);
		$post_countries = implode(',',$post_countries_array);
		$post_years = implode(',',$post_years_array);
		$post_actors = implode(',',$post_actors_array);


		$film_info = '
			<p><i class="fas fa-calendar-alt fa-lg"></i> Год : '.$post_years.'</p>
			<p><i class="fas fa-flag fa-lg""></i> Страна : '.$post_countries.'</p>
			<p><i class="fas fa-filter fa-lg""></i> Жанр : '.$post_ganres.'</p>
			<p><i class="fas fa-users fa-lg""></i> Актеры : '.$post_actors.'</p>
		';

		$film_footer_info = '
			<div class="row">
				<div class="col-md-6"><label class = "meta-field"><i class="fas fa-coins fa-lg"></i> Стоимость сеанса  '.$price[0].'</label></div>
				<div class="col-md-6"><label class = "meta-field"><i class="fas fa-door-open fa-lg""></i> Дата выхода  '.$release_date[0].'</small></label></div>
			</div>
		';

		if (is_page_template( 'templates/bootstrap-elems.php')){
			return $film_info.$content.$film_footer_info;
		}
		return $film_info.$content.$film_footer_info;
	};

	return $content;
}


add_filter('excerpt_length', 'excerpt_length');

function excerpt_length(){
	if (is_page_template( 'templates/bootstrap-elems.php')){
		return 100;
	}
}

?>