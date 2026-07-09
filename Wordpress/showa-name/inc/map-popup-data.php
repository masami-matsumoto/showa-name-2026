<?php
/**
 * トップマップポップアップ文言（index.html 準拠）
 *
 * @package showa-name
 */

defined( 'ABSPATH' ) || exit;

/**
 * @return array<int, array{title:string,lines:string[]}>
 */
function showa_get_map_popup_items() {
	return array(
		array(
			'title' => __( '避難はしご（防災設備）', 'showa-name' ),
			'lines' => array(
				__( '避難はしごに貼付される注意表示', 'showa-name' ),
				__( 'ステッカーとして使用されています。', 'showa-name' ),
			),
		),
		array(
			'title' => __( 'バルコニー仕切り板', 'showa-name' ),
			'lines' => array(
				__( 'バルコニーの仕切り板として', 'showa-name' ),
				__( '使用されています。', 'showa-name' ),
			),
		),
		array(
			'title' => __( 'パソコン（電子機器）', 'showa-name' ),
			'lines' => array(
				__( 'パソコンや電化製品のケーブル', 'showa-name' ),
				__( '周りに使用される絶縁フィルム', 'showa-name' ),
				__( 'やシートとして使用されています。', 'showa-name' ),
			),
		),
		array(
			'title' => __( '表彰盾・トロフィー', 'showa-name' ),
			'lines' => array(
				__( '表彰盾やトロフィーに取り付けら', 'showa-name' ),
				__( 'れる銘板として使用されています。', 'showa-name' ),
			),
		),
		array(
			'title' => __( '洗濯機（家電）', 'showa-name' ),
			'lines' => array(
				__( '洗濯機などの家電製品の操作部に', 'showa-name' ),
				__( 'あるスイッチパネルとして採用さ', 'showa-name' ),
				__( 'れています。', 'showa-name' ),
			),
		),
		array(
			'title' => __( 'ガスレンジ（厨房機器）', 'showa-name' ),
			'lines' => array(
				__( 'ガスレンジなどの厨房機器の注意', 'showa-name' ),
				__( 'パネルや表示シールとして使用さ', 'showa-name' ),
				__( 'れています。', 'showa-name' ),
			),
		),
		array(
			'title' => __( 'インターホン（住宅設備）', 'showa-name' ),
			'lines' => array(
				__( '玄関に設置されるインターホンの', 'showa-name' ),
				__( '表示パネルとして使用されています。', 'showa-name' ),
			),
		),
		array(
			'title' => __( '表札（住宅関連）', 'showa-name' ),
			'lines' => array(
				__( '住宅の表札に使用されるアルミ', 'showa-name' ),
				__( 'プレートやアクリルパネルとし', 'showa-name' ),
				__( 'て使用されています。', 'showa-name' ),
			),
		),
		array(
			'title' => __( 'お風呂・給湯器', 'showa-name' ),
			'lines' => array(
				__( 'お風呂や給湯器の操作部に使用さ', 'showa-name' ),
				__( 'れるスイッチパネルとして使用さ', 'showa-name' ),
				__( 'れています。', 'showa-name' ),
			),
		),
		array(
			'title' => "化粧品容器\n（パッケージ用品）",
			'lines' => array(
				__( '化粧品容器の表示ラベルや', 'showa-name' ),
				__( '直接的な印刷として使用され', 'showa-name' ),
				__( 'ています。', 'showa-name' ),
			),
		),
		array(
			'title' => __( '血圧測定器（医療機器）', 'showa-name' ),
			'lines' => array(
				__( '血圧測定器の操作部に使用される', 'showa-name' ),
				__( 'フロントパネルとして使用されて', 'showa-name' ),
				__( 'います。', 'showa-name' ),
			),
		),
		array(
			'title' => "照明スイッチプレート\n（電気設備）",
			'lines' => array(
				__( 'ベッドルームの照明スイッチ周辺', 'showa-name' ),
				__( 'に使用されるスイッチプレートと', 'showa-name' ),
				__( 'して使用されています。', 'showa-name' ),
			),
		),
	);
}
