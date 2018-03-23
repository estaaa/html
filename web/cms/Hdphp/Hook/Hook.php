<?php namespace Hdphp\Hook;


class Hook
{
    //钓子
    private $hook = array();

    public $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * 添加钓子事件
     *
     * @param $hook   钓子名称
     * @param $action 钓子事件
     */
    public function add($hook, $action)
    {
        if ( ! isset($this->hook[$hook]))
        {
            $this->hook[$hook] = array();
        }

        if (is_array($action))
        {
            $this->hook[$hook] = array_merge($this->hook[$hook], $action);
        }
        else
        {
            $this->hook[$hook][] = $action;
        }
    }

    /**
     * 获得钓子信息
     *
     * @param string $hook 钓子名
     *
     * @return array
     */
    public function get($hook = '')
    {
        if (empty($hook))
        {
            return $this->hook;
        }
        else
        {
            return $this->hook[$hook];
        }
    }

    /**
     * 批量导入钓子
     *
     * @param      $data      钓子数据
     * @param bool $recursive 是否递归合并
     */
    public function import($data, $recursive = true)
    {
        if ($recursive === false)
        {
            $this->hook = array_merge($this->hook, $data);
        }
        else
        {
            foreach ($data as $hook => $value)
            {
                if ( ! isset($this->hook[$hook]))
                {
                    $this->hook[$hook] = array();
                }

                if (isset($value['_overflow']))
                {
                    unset($value['_overflow']);
                    $this->hook[$hook] = $value;
                }
                else
                {
                    $this->hook[$hook] = array_merge($this->hook[$hook], $value);
                }
            }
        }
    }

    /**
     * 监听钓子
     *
     * @param      $hook  钓子名
     * @param null $param 参数
     *
     * @return bool
     */
    public function listen($hook, &$param = null)
    {
        if ( ! isset($this->hook[$hook]))
        {
            return false;
        }

        foreach ($this->hook[$hook] as $name)
        {
            if (false == $this->exe($name, $hook, $param))
            {
                return;
            }
        }
    }

    /**
     * 执行钓子
     *
     * @param      $name   钓子名
     * @param      $action 钓子方法
     * @param null $param  参数
     *
     * @return boolean
     */
    public function exe($name, $action = 'run', &$param = null)
    {
        if (substr($name, -4) == 'Hook')
        {
            //钓子
            $action = 'run';
        }
        else
        {
            //插件
            $file = 'addons/' . $name . '/' . $name . 'Addon.php';
            if ( ! is_file($file))
            {
                return false;
            }
            require_once($file);
            $name = "\\addons\\{$name}\\" . $name . 'Addon';

            if ( ! class_exists($name, false))
            {
                return false;
            }
        }
        $obj = new $name;
        if (method_exists($obj, $action))
        {
            $obj->$action($param);
        }

        return true;
    }
}