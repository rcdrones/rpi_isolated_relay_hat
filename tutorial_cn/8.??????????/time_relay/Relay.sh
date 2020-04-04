#! /bin/bash


# 首先得到第一个参数，保存到ch里面
if [ $1 == 'CH1' ]
then
	ch=26
elif [ $1 == 'CH2' ]
then
	ch=20
elif [ $1 == 'CH3' ]
then
	ch=21
else
	echo "Parameter error"
	exit
fi

# 判断第二个参数的合法性。保存到state里面
if [ $2 == 'ON' ]
then
	state=0
elif [ $2 == 'OFF' ]
then
	state=1
else
	echo "Parameter error"
	exit
fi

# ON/OFF操作的核心代码
echo $ch > /sys/class/gpio/export 
echo out > /sys/class/gpio/gpio$ch/direction
echo $state > /sys/class/gpio/gpio$ch/value

# 回显结果
echo Relay $1 $2

