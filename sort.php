<?php
	//maopo
	function bubbleSort($numbers) {
		$length = count($numbers);
		for( $i=0; $i<$length;$i++ ) {	//que ding xun huan ci shu
			for($j = 0; $j < $length-$i-1;$j++) {
				if($numbers[$j] < $numbers[$j+1]) {
					$temp = $numbers[$j];
					$numbers[$j] = $numbers[$j+1];
					$numbers[$j+1] = $temp;
				}
			}
		}
		return $numbers;
	}

	//charu
	function insertSort($numbers) {
		$length = count($numbers);
		for($i = 1;$i<$length;$i++) {
			$temp = $numbers[$i];
			for($j = $i-1;$j>=0;$j--) {
				if( $temp > $numbers[$j]) {
					$numbers[$j+1] = $numbers[$j];
					$numbers[$j] = $temp;
				}
			}
		}
		return $numbers;
	}

	//select
	function selectSort($numbers){
		$length = count($numbers);
		for($i = 0;$i<$length-1;$i++) {
			$p = $i;
			for($j = $i+1;$j<$length;$j++) {
				if($numbers[$p] > $numbers[$j]) {
					$p = $j;
				}
			}

			if($p != $i) {
				$temp = $numbers[$p];
				$numbers[$p] = $numbers[$i];
				$numbers[$i] = $temp;
			}
		}
		return $numbers;
	}

	//quick
	function quick_sort($arr) {
	    //先判断是否需要继续进行
	    $length = count($arr);
	    if($length <= 1) {
	        return $arr;
	    }
	    //如果没有返回，说明数组内的元素个数 多余1个，需要排序
	    //选择一个标尺
	    //选择第一个元素
	    $base_num = $arr[0];
	    //遍历 除了标尺外的所有元素，按照大小关系放入两个数组内
	    //初始化两个数组
	    $left_array = array();//小于标尺的
	    $right_array = array();//大于标尺的
	    for($i=1; $i<$length; $i++) {
	        if($base_num > $arr[$i]) {
	            //放入左边数组
	            $left_array[] = $arr[$i];
	        } else {
	            //放入右边
	            $right_array[] = $arr[$i];
	        }
	    }
	    //再分别对 左边 和 右边的数组进行相同的排序处理方式
	    //递归调用这个函数,并记录结果
	    $left_array = quick_sort($left_array);
	    $right_array = quick_sort($right_array);
	    //合并左边 标尺 右边
	    return array_merge($left_array, array($base_num), $right_array);
	}
		
	$str = array(2,5,7,9,1,0,3,4,6,8);
	$bubble = bubbleSort($str);	//mao pao pai xu
	$insert = insertSort($str);
	$select = selectSort($str);
	echo '<pre>';
	var_dump($select);