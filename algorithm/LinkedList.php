<?php
/**
 * 链表结构
 */
class Hero{
    public $no;
    public $name;
    public $next=null;
    public function __construct($no=null,$name=null){
        $this->no = $no;
        $this->name = $name;
    }
}

/**
 * 链表操作
 */
class SingleLink{
    /**
     * 添加节点
     */
    public function addNode($head,$node)
    {
        $insertNode = $head;
        $afterNode  = null;		// 插入节点的后续节点
        while ($insertNode->next!=null){
            if ($node->no < $insertNode->next->no){
                $afterNode = $insertNode->next;
                break;
            }elseif($node->no == $insertNode->next->no){
                throw new \Exception('排名 '.$node->no.' 节点已存在！');
            }
            $insertNode = $insertNode->next;
        }
        if( $afterNode ){	// 将后续节点拼接到当前插入节点的后面
            $node->next = $afterNode;
        }
        $insertNode->next = $node;
    }

    /**
     * 删除节点
     */
    public function delNode($head,$no)
    {
        $currentNode 	= $head;
        $prevNode 		= $head;
        while ($currentNode->next!=null){
            $currentNode = $currentNode->next;
            if( $currentNode->no==$no ){
                $prevNode->next = $currentNode->next;
                break;
            }
            $prevNode = $currentNode;
        }
    }

    /**
     * 显示节点
     */
    public function showNode($head)
    {
        $currentNode = $head;
        while ($currentNode->next!=null){
            $currentNode = $currentNode->next;
            echo '第 '.$currentNode->no.' 名：'.$currentNode->name."<br/>";
        }
    }
}

//创建一个head头,该head 只是一个头，不放入数据
$head 		= new Hero();
$heroList 	= new SingleLink();

$hero_01 = new Hero(1,'宋江');
$hero_02 = new Hero(2,'卢俊义');
$hero_03 = new Hero(3,'公孙胜');
$hero_04 = new Hero(4,'吴用');
$hero_05 = new Hero(5,'关胜');
$hero_06 = new Hero(6,'林冲');


$heroList->addNode($head, $hero_01);
$heroList->addNode($head, $hero_03);
$heroList->addNode($head, $hero_02);
$heroList->addNode($head, $hero_05);
$heroList->addNode($head, $hero_04);
$heroList->addNode($head, $hero_06);
//$heroList->addNode($head, $hero_02);


$heroList->showNode($head);

echo "<br/><br/>";
$heroList->delNode($head,3);
$heroList->delNode($head,5);
$heroList->showNode($head);
