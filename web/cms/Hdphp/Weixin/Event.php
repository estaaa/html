<?php namespace Hdphp\Weixin;

//事件消息
trait Event
{

	//关注
	public function isSubscribeEvent()
	{
		return $this->receive->Event = self::EVENT_TYPE_SUBSCRIBE;
	}

	//取消关注
	public function isUnSubscribeEvent()
	{
		return $this->receive->Event = self::EVENT_TYPE_UNSUBSCRIBE;
	}

	//未关注用户扫描二维码
	public function isUnSubscribeScanEvent()
	{
		return $this->receive->Event = self::EVENT_TYPE_UNSUBSCRIBE_SCAN;
	}

	//关注用户二维码事件
	public function isScanEvent()
	{
		return $this->receive->Event = self::EVENT_TYPE_SCAN;
	}

	//上报地理位置事件
	public function isLocationEvent()
	{
		return $this->receive->Event = self::EVENT_TYPE_LOCATION;
	}

	//点击菜单拉取消息时的事件推送
	public function isClickEvent()
	{
		return $this->receive->Event = self::EVENT_TYPE_CLICK;
	}

	//点击菜单跳转链接时的事件推送
	public function isViewEvent()
	{
		return $this->receive->Event = self::EVENT_TYPE_VIEW;
	}

}