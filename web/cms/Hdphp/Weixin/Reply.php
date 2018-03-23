<?php namespace Hdphp\Weixin;

trait Reply
{

	//回复文本消息
	public function text($content)
	{
		$xml ='<xml>
<ToUserName><![CDATA[$s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[$s]]></MsgType>
<Content><![CDATA[$s]]></Content>
</xml>';
		$text = sprintf($xml,$this->receive->FromUserName,$this->receive->ToUserName,time(),
		self::REPLY_TYPE_TEXT,$content);
		header('Content-type:application/xml');
		echo $text;
	}

	//回复图片消息
	public function image($media_id)
	{
		$xml ='<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Image>
<MediaId><![CDATA[%s]]></MediaId>
</Image>
</xml>';
		$text = sprintf($xml,$this->receive->FromUserName,$this->receive->ToUserName,time(),
		self::REPLY_TYPE_IMAGE,$media_id);
		header('Content-type:application/xml');
		echo $text;
	}

	//回复语音消息
	public function voice($media_id)
	{
		$xml = '<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Voice>
<MediaId><![CDATA[%s]]></MediaId>
</Voice>
</xml>';
		$text = sprintf($xml,$this->receive->FromUserName,$this->receive->ToUserName,time(),
		self::REPLY_TYPE_VOICE,$media_id);
		header('Content-type:application/xml');
		echo $text;
	}

	//回复视频消息
	public function video($video)
	{
		$xml = '<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Video>
<MediaId><![CDATA[%s]]></MediaId>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
</Video> 
</xml>';
		$text = sprintf($xml,$this->receive->FromUserName,$this->receive->ToUserName,time(),
		self::REPLY_TYPE_VIDEO,$video['media_id'],$video['title'],$video['description']);
		header('Content-type:application/xml');
		echo $text;
	}

	//回复音乐消息
	public function music($music)
	{
		$xml = '<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Music>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<MusicUrl><![CDATA[%s]]></MusicUrl>
<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
<ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
</Music>
</xml>';
		$text = sprintf($xml,$this->receive->FromUserName,$this->receive->ToUserName,time(),
		self::REPLY_TYPE_MUSIC,$music['title'],$video['description'],$video['musicurl'],
		$video['hqmusicurl'],$video['thumbmediaid']);
		header('Content-type:application/xml');
		echo $text;
	}

	//回复图文信息
	public function news($news)
	{
		$xml = '<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<ArticleCount>%s</ArticleCount>
<Articles>
%s
</Articles>
</xml>';
		$item = '<item>
<Title><![CDATA[%s]]></Title> 
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>';
		$items = '';
		foreach((array) $news as $n)
		{
			$items.=sprintf($item,$n['title'],$n['discription'],$p['picurl'],$p['url']);
		}

		$text = sprintf($xml,$this->receive->FromUserName,$this->receive->ToUserName,time(),
		self::REPLY_TYPE_NEWS,count($news),$items);

		header('Content-type:application/xml');
		echo $text;
	}




}