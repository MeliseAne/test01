<?

$data = array(
array('ID'=>100, 'PARENT_ID' => 0, 'NAME'=> 'Пункт 1',),
array('ID'=>2, 'PARENT_ID' => 0, 'NAME'=> 'Пункт 2',),
array('ID'=>3, 'PARENT_ID' => 0, 'NAME'=> 'Пункт 3',),
array('ID'=>4, 'PARENT_ID' => 0, 'NAME'=> 'Пункт 4',),
array('ID'=>52, 'PARENT_ID' => 100, 'NAME'=> 'Пункт 1.1',),
array('ID'=>6, 'PARENT_ID' => 100, 'NAME'=> 'Пункт 1.2',),
array('ID'=>7, 'PARENT_ID' => 100, 'NAME'=> 'Пункт 1.3',),
array('ID'=>8, 'PARENT_ID' => 100, 'NAME'=> 'Пункт 1.4',),
array('ID'=>9, 'PARENT_ID' => 52, 'NAME'=> 'Пункт 1.1.1',),
array('ID'=>10, 'PARENT_ID' => 52, 'NAME'=> 'Пункт 1.1.2',),
array('ID'=>11, 'PARENT_ID' => 52, 'NAME'=> 'Пункт 1.1.3',),
array('ID'=>12, 'PARENT_ID' => 52, 'NAME'=> 'Пункт 1.1.4',),
array('ID'=>13, 'PARENT_ID' => 9, 'NAME'=> 'Пункт 1.1.1.1',),
array('ID'=>14, 'PARENT_ID' => 9, 'NAME'=> 'Пункт 1.1.1.2',),
array('ID'=>15, 'PARENT_ID' => 9, 'NAME'=> 'Пункт 1.1.1.3',),
array('ID'=>16, 'PARENT_ID' => 9, 'NAME'=> 'Пункт 1.1.1.4',),
array('ID'=>87, 'PARENT_ID' => 2, 'NAME'=> 'Пункт 2.1',),
array('ID'=>18, 'PARENT_ID' => 2, 'NAME'=> 'Пункт 2.2',),
array('ID'=>19, 'PARENT_ID' => 3, 'NAME'=> 'Пункт 3.1',),
array('ID'=>20, 'PARENT_ID' => 3, 'NAME'=> 'Пункт 3.2',),
array('ID'=>21, 'PARENT_ID' => 4, 'NAME'=> 'Пункт 4.1',),
array('ID'=>22, 'PARENT_ID' => 4, 'NAME'=> 'Пункт 4.2',),
array('ID'=>23, 'PARENT_ID' => 87, 'NAME'=> 'Пункт 2.1.1',),
array('ID'=>24, 'PARENT_ID' => 87, 'NAME'=> 'Пункт 2.1.2',),
array('ID'=>25, 'PARENT_ID' => 23, 'NAME'=> 'Пункт 2.1.1.1',),
array('ID'=>26, 'PARENT_ID' => 23, 'NAME'=> 'Пункт 2.1.1.2',),
array('ID'=>27, 'PARENT_ID' => 19, 'NAME'=> 'Пункт 3.1.1',),
array('ID'=>28, 'PARENT_ID' => 19, 'NAME'=> 'Пункт 3.1.2',),
array('ID'=>1, 'PARENT_ID' => 20, 'NAME'=> 'Пункт 3.2.1',),
array('ID'=>30, 'PARENT_ID' => 1, 'NAME'=> 'Пункт 3.2.1.1'));


  function tree($arr)
{

 $tree = array();
        foreach ($arr as $value) {
        	//формирование массива родителя и его потомков
            $tree[$value['PARENT_ID']][] = $value;
        }

        	return $tree;
}

function create_tree($cats, $parent_id)
{
    if (is_array($cats) && isset($cats[$parent_id])) {
        $tree = '<ul>';
        foreach ($cats[$parent_id] as $cat) {
            $tree .= '<li>' . $cat['NAME'];
            //не является ли текущий потомок в свою очередь чьим-то родителем
            $tree .= create_tree($cats, $cat['ID']);
            $tree .= '</li>';
        }
        $tree .= '</ul>';
    } else {
        return false;
    }
    return $tree;
}

$tree = tree($data);
echo create_tree($tree, 0);

?>