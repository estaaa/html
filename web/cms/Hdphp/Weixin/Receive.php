<?php namespace Hdphp\Weixin;

//接收消息
trait Receive
{

	//文本消息
	public function isTextMsg()
	{
		return $this->receive->MsgType == self::MSG_TYPE_TEXT;
	}

	//图像消息
	public function isImageMsg()
	{
		return $this->receive->MsgType == self::MSG_TYPE_IMAGE;
	}

	//声音消息
	public function isVoiceMsg()
	{
		return $this->receive->MsgType == self::MSG_TYPE_VOICE;
	}

	//地址消息
	public function isLocationMsg()
	{
		return $this->receive->MsgType == self::MSG_TYPE_LOCATION;
	}

	//链接消息
	public function isLinkMsg()
	{
		return $this->receive->MsgType == self::MSG_TYPE_LINK;
	}

	//视频消息
	public function isVideoMsg()
	{
		return $this->receive->MsgType == self::MSG_TYPE_VIDEO;
	}

	//小视频消息
	public function isSmallVideoMsg()
	{
		return $this->receive->MsgType == self::MSG_TYPE_SMALL_VIDEO;
	}


}