#!/bin/bash
#自动创建控制器以及svn同步
echo "1:$0"
echo "2:$1"
echo "3:$2"
if [ -n "$1" ];
then 
  if [ -n "$2" ];
  then
    addr=${2}
  else
    if [[ $1 =~ "_" ]]
    then
      addr="${1//_//}"
    else
      addr=${1}/${1}
    fi
  fi
  echo "表名：$1"
  echo "路径：$addr"
  
  php think crud -t $1 -c $addr --force=true #生成crud，并生成对应的文件
  echo yes|php think menu -c $addr -d 1  #删除原有的菜单
  php think menu -c $addr  #生成新的菜单
else 
  echo "参数不存在，重新填写！"
fi