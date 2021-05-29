<?php

function request($url, $data, $headers, $put = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	if($put):
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	endif;
	if($data):
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
	curl_setopt($ch, CURLOPT_TIMEOUT, 120);
	endif;
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if($headers):
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	endif;
	curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
	return curl_exec($ch);
}


function getid($username, $id) {
$url = "https://gql.tokopedia.com/";
$data = '[{"operationName":"ShopInfoCore","variables":{"id":0,"domain":"'.$username.'"},"query":"query ShopInfoCore($id: Int!, $domain: String) {\n  shopInfoByID(input: {shopIDs: [$id], fields: [\"active_product\", \"address\", \"allow_manage\", \"assets\", \"core\", \"closed_info\", \"create_info\", \"favorite\", \"location\", \"status\", \"is_open\", \"other-goldos\", \"shipment\", \"shopstats\", \"shop-snippet\", \"other-shiploc\", \"shopHomeType\"], domain: $domain, source: \"shoppage\"}) {\n    result {\n      shopCore {\n        description\n        domain\n        shopID\n        name\n        tagLine\n        defaultSort\n        __typename\n      }\n      createInfo {\n        openSince\n        __typename\n      }\n      favoriteData {\n        totalFavorite\n        alreadyFavorited\n        __typename\n      }\n      activeProduct\n      shopAssets {\n        avatar\n        cover\n        __typename\n      }\n      location\n      isAllowManage\n      isOpen\n      shopHomeType\n      address {\n        name\n        id\n        email\n        phone\n        area\n        districtName\n        __typename\n      }\n      shipmentInfo {\n        isAvailable\n        image\n        name\n        product {\n          isAvailable\n          productName\n          uiHidden\n          __typename\n        }\n        __typename\n      }\n      shippingLoc {\n        districtName\n        cityName\n        __typename\n      }\n      shopStats {\n        productSold\n        totalTxSuccess\n        totalShowcase\n        __typename\n      }\n      statusInfo {\n        shopStatus\n        statusMessage\n        statusTitle\n        __typename\n      }\n      closedInfo {\n        closedNote\n        until\n        reason\n        __typename\n      }\n      bbInfo {\n        bbName\n        bbDesc\n        bbNameEN\n        bbDescEN\n        __typename\n      }\n      goldOS {\n        isGold\n        isGoldBadge\n        isOfficial\n        badge\n        __typename\n      }\n      shopSnippetURL\n      customSEO {\n        title\n        description\n        bottomContent\n        __typename\n      }\n      __typename\n    }\n    error {\n      message\n      __typename\n    }\n    __typename\n  }\n}\n"}]';
$headers = array();
$headers [] = "Host: gql.tokopedia.com";
$headers [] = "Connection: close";
//$headers [] = "Content-Length: 399";
$headers [] = "accept: */*";
$headers [] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36";
$headers [] = "content-type: application/json";
$headers [] = "Accept-Encoding: gzip, deflate";
$headers [] = "Accept-Language: en-US,en;q=0.9";
$headers [] = "Cookie: bm_sz=9CAD8FF91D9DD15A98719F436E36E36A~YAAQlwnOdEexCBFzAQAA60gzKAhOUzH8VhPLzMYjQBti2llrfIViNB9IWHmZyhzgvXCyTesFbwfZ3QWdEmVlmmm0z2m9cMl0ftPktXlHGVC/9oopxxowOc8XY/HMuPosZ3AHdcIJleZpaLSMEGRkmJrU5EHexHjVmAM9KpN9ZdWq8885GkU2P+sDLoBdxOpQJNo=; _gcl_au=1.1.386260855.1594107321; _SID_Tokopedia_=RPXgd9DLls8IPMZU_b9xWOikQnGZrvf_UhmrgY7AqBjdzgraxRK9ghsED4w7gbcUPQ3n90OQvc_JFYqPIYFQ3ucijd4l1EgH6UFqevhLfTKJ6h6o1bWSkXs4tL4i9HwZ; DID=961465e9f85cee909021e0c3b69bf723433856e605cbfa29024c7e0f36ed9dc8a1fdfef12d201f39ecba333f90934d7d; DID_JS=OTYxNDY1ZTlmODVjZWU5MDkwMjFlMGMzYjY5YmY3MjM0MzM4NTZlNjA1Y2JmYTI5MDI0YzdlMGYzNmVkOWRjOGExZmRmZWYxMmQyMDFmMzllY2JhMzMzZjkwOTM0ZDdk47DEQpj8HBSa+/TImW+5JCeuQeRkm5NMpJWZG3hSuFU=; ak_bmsc=209D797B0BDBE4BD2E5BD879F14EDDD474CE0997745D0000B425045F97335F31~plgz7mRFo3i8PfNTjrPfgYmQjGte5o2Hq8hv5PAdvFHRHxSte+QTNkpeU9BvXvOyh+55TLxoor5h2OgHPbQy1+hQx/lf3MrkrFotCqvVj67cIcElybbJVcNDea67qTsmDyVymUTVSkqVE6FLBasfvTCOUIPbMza1suznGDnIPp/PEOZkbjqRWMDKD8s2Af2yPv28sLuSoHKzAl1v5zNkG+rod6QmEj3oKnhy23ZLWjuigt9/zOqWzc+wSpIIB8XAOS; _ga=GA1.2.1540103073.1594107322; _gid=GA1.2.1904022334.1594107322; AMP_TOKEN=%24NOT_FOUND; moe_uuid=3ee41014-aa29-4d0b-b51d-8402ac1f6ed1; __asc=ff54e8ca173283372eafacf277c; __auc=ff54e8ca173283372eafacf277c; _fbp=fb.1.1594107327983.101130246; _UUID_NONLOGIN_=cf05ae3983affde9853b2697fbe9f530; _gat_UA-9801603-1=1; lpa=1; bm_sv=1885E2599D1D8E7BDD1CD91C2D719271~Re31SaOSM4HyysC/7VTJi6ievumPP/r1xyEbPXAc8jDssVhZx5oew5Qo4nxyh6JGMrGIt/C3XetiYHQrc4yDEM4TG7Kz5136uWf+4a11zzmBPbChXuacvqHzoyCV2e2dlGmWJc9P/ozdjdTIf0kmIHCgfx4GePW70w6LUVOX+7k=; _dc_gtm_UA-9801603-1=1; _abck=43D8F071358DEE941D67ABC99781B64C~0~YAAQlwnOdGO1CBFzAQAAp1o1KARgJOQ2W5SXOZ91ei0+LNhDTLJRqMRFDWGnROmxwljMrdzGZGyTeubqqNX26sEZ4ZoGlqVUkPalDHiDC21NcKYpiJlOiywDz0SiWibiyX7txuuMytoJX1BeOcWiE//MIypZ1Hmat9PbVgR8/pKDbwnCESue9xH3cwLKwPG93Rz3n2EVHIXE7TIVEtBS+hsiC7MZG3qww4p8QhEPCQjnNkxSoOmMVjCBfZPh0pn5MPwscemB5K9lx8JOwQ1WlosMTXXJOc3sjvlkwEKrLEgj+gc1VdKXIClTxgm8zjKh+7x8hvW7+VEP4A==~-1~-1~-1";





$getotp = request($url, $data, $headers);
$json = json_decode($getotp, true);
//var_dump($json);

$ab5 = $json[0]['data'];

if ($ab5 == NULL) {
	echo "User tidak ada\n";
	return FALSE;
} else {

if ($id == 1) {
	$a = $json[0]['data']['shopInfoByID']['result'][0]['shopCore']['name'];
	return $a;
} elseif ($id == 2) {
	$b = $json[0]['data']['shopInfoByID']['result'][0]['shopCore']['shopID'];
	return $b;
} elseif ($id == 3){
	$c = $json[0]['data']['shopInfoByID']['result'][0]['favoriteData']['totalFavorite'];
	return $c;

}
}
}


function regis($ids, $berer, $no) {
$url = "https://gql.tokopedia.com/";
$data = '[
  {
    "variables": {
      "input": {
        "shopID": "'.$ids.'"
      }
    },
    "operationName": null,
    "knr": "2e9ca25a2ba88c2d48a5d6d0cac647b0",
    "query": "mutation followShop($input: ParamFollowShop!) {\n  followShop(input:$input){\n    success\n    message\n  }\n}\n"
  }
]';
$headers = array();
$headers [] = "User-Agent: TkpdConsumer/3.81 (Android 6.0;)";
$headers [] = "Accounts-Authorization: Bearer $berer";
//$headers [] = "Content-Length: 399";
$headers [] = "Content-Type: application/json; charset=UTF-8";
$headers [] = "Host: gql.tokopedia.com";
$headers [] = "Connection: close";



$getotp = request($url, $data, $headers);
$json = json_decode($getotp, true);
$a = $json[0]['data']['followShop']['message'];
echo "$no --> $a\n";
}

echo "=========================\n";
echo "Auto Follow Tokopedia\n";
echo "=========================\n";
echo "Masukan username: ";
$user = trim(fgets(STDIN));
$abc1 = getid($user, 1);
$abc2 = getid($user, 2);
$abc3 = getid($user, 3);

echo "Nama Store: $abc1\n";
echo "Folowers: $abc3\n";




$data=file_get_contents("dbtkp.txt");
$ex = explode("\n", str_replace("\r", "", $data));
$count = count($ex);
if ($abc2 == FALSE) {
	echo "Masukan username yang benar";
} else {
for($i=0;$i<$count;$i++) {
regis($abc2, $ex[$i], $i);
}
}

