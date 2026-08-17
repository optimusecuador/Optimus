# jun/16/2026 11:21:30 by RouterOS 6.47.1
# software id = JJIW-LSF2
#
# model = CCR1036-12G-4S
# serial number = 7427060A1F27
/interface bridge
add name=COM_SERVERS
add name=LO
add comment="WAN PUBLICAS" name=loopback
/interface ethernet
set [ find default-name=ether10 ] comment="SERVER FISICO"
set [ find default-name=ether11 ] comment=OFICINA
set [ find default-name=ether12 ] comment="CLIENTE GASOLINERA"
set [ find default-name=sfp1 ] auto-negotiation=no comment="OLT PORT 1"
set [ find default-name=sfp2 ] auto-negotiation=no comment=\
    "PRINCIPAL PUERTAS DEL SOL RX: -11.7 dBm"
set [ find default-name=sfp3 ] auto-negotiation=no comment=\
    "BACKUP TO SAN JOAQUIN RX: -7.52 dBm"
set [ find default-name=sfp4 ] comment="OLT PORT 2"
/interface gre
add comment="COMUNICACION TOTORACOCHA" local-address=10.172.0.58 name=\
    TUNNEL_TOTORACOCHA_OTT remote-address=10.172.0.70
/interface bonding
add comment="BONDING OLT" mode=802.3ad name=bonding_UPLINK slaves=sfp1,sfp4 \
    transmit-hash-policy=layer-2-and-3
add comment="BONDING WAN" name=bonding_WAN slaves=sfp2,sfp3 \
    transmit-hash-policy=layer-2-and-3
/interface vlan
add comment=GESTION interface=bonding_UPLINK name=vlan200 vlan-id=200
add interface=bonding_WAN name=vlan924_sfp2 vlan-id=924
add interface=bonding_UPLINK name=vlan2000_Bonding vlan-id=2000
add interface=bonding_UPLINK name=vlan2001_Bonding vlan-id=2001
add interface=bonding_UPLINK name=vlan2002_Bonding vlan-id=2002
add interface=bonding_UPLINK name=vlan2003_Bonding vlan-id=2003
add interface=bonding_UPLINK name=vlan2004_Bonding vlan-id=2004
add interface=bonding_UPLINK name=vlan2005_Bonding vlan-id=2005
add interface=bonding_UPLINK name=vlan2006_Bonding vlan-id=2006
add interface=bonding_UPLINK name=vlan2007_Bonding vlan-id=2007
add interface=bonding_UPLINK name=vlan2008_Bonding vlan-id=2008
add interface=bonding_UPLINK name=vlan2009_Bonding vlan-id=2009
add interface=bonding_UPLINK name=vlan2010_Bonding vlan-id=2010
add interface=bonding_UPLINK name=vlan2011_Bonding vlan-id=2011
add interface=bonding_UPLINK name=vlan2012_Bonding vlan-id=2012
add interface=bonding_UPLINK name=vlan2013_Bonding vlan-id=2013
add interface=bonding_UPLINK name=vlan2014_Bonding vlan-id=2014
add interface=bonding_UPLINK name=vlan2015_Bonding vlan-id=2015
add interface=bonding_UPLINK name=vlan2016_Bonding vlan-id=2016
add interface=bonding_UPLINK name=vlan2017_Bonding vlan-id=2017
add interface=bonding_UPLINK name=vlan2018_Bonding vlan-id=2018
add interface=bonding_UPLINK name=vlan2019_Bonding vlan-id=2019
add comment="COMUNICACION TO MISICATA" interface=bonding_WAN name=\
    vlan3515_sfp2 vlan-id=3515
/interface wireless security-profiles
set [ find default=yes ] supplicant-identity=MikroTik
/ip firewall layer7-protocol
add name=Tiktok regexp="^.+(tiktokv.com|musical.ly).*\$"
/ip pool
add name=dhcp_pool5 ranges=10.106.1.74
add name=dhcp_pool6 ranges=10.106.1.74
/queue type
add kind=pcq name=PCQ_Down_Residencial1 pcq-burst-time=30s pcq-classifier=\
    dst-address pcq-dst-address6-mask=64 pcq-rate=4M pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Residencial2 pcq-burst-time=30s pcq-classifier=\
    dst-address pcq-dst-address6-mask=64 pcq-rate=3100k \
    pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Residencial3 pcq-burst-time=30s pcq-classifier=\
    dst-address pcq-dst-address6-mask=64 pcq-rate=4100k \
    pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Residencial4 pcq-burst-rate=1700k \
    pcq-burst-threshold=384k pcq-burst-time=1m20s pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=1500k pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Residencial5 pcq-burst-rate=2M \
    pcq-burst-threshold=384k pcq-burst-time=1m10s pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=1800k pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Residencial6 pcq-burst-rate=2200k \
    pcq-burst-threshold=500k pcq-burst-time=1m pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=2M pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Corporativo1 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=200M pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Corporativo2 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=2500k pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Corporativo3 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=102M pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Corporativo4 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=80M pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Medidores_Gratuitos pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=2700k pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Gratuitos pcq-burst-rate=1100k \
    pcq-burst-threshold=384k pcq-burst-time=2m pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=768k pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Gratuitos_VIP pcq-burst-rate=1400k \
    pcq-burst-threshold=384k pcq-burst-time=1m20s pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=1200k pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Notificados pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=5k pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_ServidoresLocales pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=3M pcq-src-address6-mask=64
add kind=pcq name=PCQ_Up_ServidoresLocales pcq-classifier=src-address \
    pcq-dst-address6-mask=64 pcq-rate=1M pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Youtube_HD pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=1700k pcq-src-address6-mask=64
add kind=pcq name=PCQ_DESCARGA_CACHE_Dedicado pcq-burst-time=1m30s \
    pcq-classifier=dst-address pcq-dst-address6-mask=64 pcq-rate=5M \
    pcq-src-address6-mask=64
add kind=pcq name=Subida_Jardin_Azuayo pcq-classifier=src-address \
    pcq-dst-address6-mask=64 pcq-rate=384k pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_BMSOFTWARE pcq-burst-rate=2500k \
    pcq-burst-threshold=312k pcq-burst-time=2m10s pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=2M pcq-src-address6-mask=64
add kind=pcq name=Thunder_PCQ pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=100M pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_MagicJAck pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=1024k pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Skype pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=1500k pcq-src-address6-mask=64
add kind=pcq name=PCQ_Up_Skype pcq-classifier=src-address \
    pcq-dst-address6-mask=64 pcq-rate=828k pcq-src-address6-mask=64
add kind=pcq name=PCQ_Down_Facebook pcq-burst-rate=9M pcq-burst-threshold=5M \
    pcq-burst-time=2m pcq-classifier=dst-address pcq-dst-address6-mask=64 \
    pcq-rate=8M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_CORP_GPON_5M pcq-burst-time=30s pcq-classifier=\
    dst-address pcq-dst-address6-mask=64 pcq-rate=5M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=100M pcq-src-address6-mask=64
add kind=pcq name=PLAN2_GPON_16M pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=150M pcq-src-address6-mask=64
add kind=pcq name=PLAN3_GPON_20M pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=85M pcq-src-address6-mask=64
add kind=pcq name=PLAN4_GPON_25M pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=90M pcq-src-address6-mask=64
add kind=pcq name=PLAN_NOCTURNO pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=50M pcq-src-address6-mask=64
add kind=pcq name=CAMBIO_NOC pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=30M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M_G2 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=100M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M_G3 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=25M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M_G4 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=101M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M_G5 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=100M pcq-src-address6-mask=64
add kind=pcq name=PLAN2_GPON_16M_G2 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=150M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M_G6 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=55M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M_G7 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=200M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M_G8 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=55M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M_G9 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=55M pcq-src-address6-mask=64
add kind=pcq name=queue1PLAN2_GPON_16M_G3 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=33M pcq-src-address6-mask=64
add kind=pcq name=PLAN2_GPON_16M_G3 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=150M pcq-src-address6-mask=64
add kind=pcq name=PLAN4_GPON_25M_G2 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=250M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M_G10 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=55M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M_G11 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=55M pcq-src-address6-mask=64
add kind=pcq name=PLAN1_GPON_10M_G12 pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=55M pcq-src-address6-mask=64
add kind=pcq name=PLAN0_GPON_20M pcq-classifier=dst-address \
    pcq-dst-address6-mask=64 pcq-rate=50M pcq-src-address6-mask=64
/queue tree
add comment="=================================================================\
    =====================================" max-limit=50M name=\
    DESCARGA_RESIDENCIALES parent=global queue=default
add comment="=================================================================\
    =====================================" max-limit=15M name=QoS_DOWN \
    parent=global queue=default
add name=DNS_Down packet-mark=dnsF parent=QoS_DOWN priority=1 queue=default
add name=SSH_Telnet_Down packet-mark=protocolosremotosF parent=QoS_DOWN \
    priority=1 queue=default
add name=VPN_Down packet-mark=vpnF parent=QoS_DOWN priority=1 queue=default
add name=WINBOX_Down packet-mark=winboxF parent=QoS_DOWN priority=1 queue=\
    default
add name="Down_Residencial 1" packet-mark=Residencial1F parent=\
    DESCARGA_RESIDENCIALES queue=PCQ_Down_Residencial1
add name="Down_Residencial 2" packet-mark=Residencial2F parent=\
    DESCARGA_RESIDENCIALES queue=PCQ_Down_Residencial2
add name="Down_Residencial 3" packet-mark=Residencial3F parent=\
    DESCARGA_RESIDENCIALES queue=PCQ_Down_Residencial3
add name="Down_Residencial 4" packet-mark=Residencial4F parent=\
    DESCARGA_RESIDENCIALES queue=PCQ_Down_Residencial4
add name="Down_Residencial 5" packet-mark=Residencial5F parent=\
    DESCARGA_RESIDENCIALES queue=PCQ_Down_Residencial5
add name="Down_Residencial 6" packet-mark=Residencial6F parent=\
    DESCARGA_RESIDENCIALES queue=PCQ_Down_Residencial6
add name=ServidoresLocales_Down packet-mark=servidoresLocalesF parent=\
    QoS_DOWN priority=2 queue=PCQ_Down_ServidoresLocales
add name=Down_MaginJack packet-mark=magicjackF parent=QoS_DOWN priority=2 \
    queue=PCQ_Down_MagicJAck
add name=Down_Skype packet-mark=skypeL7_pack parent=QoS_DOWN priority=2 \
    queue=PCQ_Down_Skype
add max-limit=81M name=DOWN_PLAN1_CORP_GPON_81M packet-mark=Corporativo4F \
    parent=global priority=2 queue=PCQ_Down_Corporativo4
add max-limit=400M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G1 packet-mark=\
    Res_F.O_PLAN1_G1_PACK parent=global priority=2 queue=PLAN1_GPON_10M
add max-limit=500M name=DESCARGA_RESIDENCIAL_F.O_PLAN_2_G1 packet-mark=\
    Res_F.O_PLAN2_G1_PACK parent=global priority=2 queue=PLAN2_GPON_16M
add max-limit=90M name=DESCARGA_RESIDENCIAL_F.O_PLAN_3_G1 packet-mark=\
    Res_F.O_PLAN3_G1_PACK parent=global priority=2 queue=PLAN3_GPON_20M
add max-limit=250M name=DESCARGA_RESIDENCIAL_F.O_PLAN_4_G1 packet-mark=\
    Res_F.O_PLAN4_G1_PACK parent=global priority=2 queue=PLAN4_GPON_25M
add max-limit=21M name=DOWN_PLAN1_CORP_GPON_20M packet-mark=Corporativo1F \
    parent=global priority=1 queue=PCQ_Down_Corporativo1
add max-limit=400M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G2 packet-mark=\
    Res_F.O_PLAN1_G2_PACK parent=global priority=2 queue=PLAN1_GPON_10M_G2
add max-limit=200M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G3 packet-mark=\
    Res_F.O_PLAN1_G3_PACK parent=global priority=2 queue=PLAN1_GPON_10M_G3
add max-limit=102M name=DOWN_PLAN1_CORP_GPON_101M packet-mark=Corporativo3F \
    parent=global priority=2 queue=PCQ_Down_Corporativo3
add max-limit=200M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G4 packet-mark=\
    Res_F.O_PLAN1_G4_PACK parent=global priority=2 queue=PLAN1_GPON_10M_G4
add max-limit=200M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G5 packet-mark=\
    Res_F.O_PLAN1_G5_PACK parent=global priority=2 queue=PLAN1_GPON_10M_G5
add max-limit=500M name=DESCARGA_RESIDENCIAL_F.O_PLAN_2_G2 packet-mark=\
    Res_F.O_PLAN2_G2_PACK parent=global priority=2 queue=PLAN2_GPON_16M_G2
add max-limit=200M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G6 packet-mark=\
    Res_F.O_PLAN1_G6_PACK parent=global priority=2 queue=PLAN1_GPON_10M_G6
add max-limit=600M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G7 packet-mark=\
    Res_F.O_PLAN1_G7_PACK parent=global priority=2 queue=PLAN1_GPON_10M_G7
add max-limit=200M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G8 packet-mark=\
    Res_F.O_PLAN1_G8_PACK parent=global priority=2 queue=PLAN1_GPON_10M_G8
add max-limit=200M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G9 packet-mark=\
    Res_F.O_PLAN1_G9_PACK parent=global priority=2 queue=PLAN1_GPON_10M_G9
add max-limit=500M name=DESCARGA_RESIDENCIAL_F.O_PLAN_2_G3 packet-mark=\
    Res_F.O_PLAN2_G3_PACK parent=global priority=2 queue=PLAN2_GPON_16M_G3
add max-limit=600M name=DESCARGA_RESIDENCIAL_F.O_PLAN_4_G2 packet-mark=\
    Res_F.O_PLAN4_G2_PACK parent=global priority=2 queue=PLAN4_GPON_25M_G2
add max-limit=200M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G10 packet-mark=\
    Res_F.O_PLAN1_G10_PACK parent=global priority=2 queue=PLAN1_GPON_10M_G10
add max-limit=200M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G11 packet-mark=\
    Res_F.O_PLAN1_G11_PACK parent=global priority=2 queue=PLAN1_GPON_10M_G11
add max-limit=200M name=DESCARGA_RESIDENCIAL_F.O_PLAN_1_G12 packet-mark=\
    Res_F.O_PLAN1_G12_PACK parent=global priority=2 queue=PLAN1_GPON_10M_G12
add max-limit=350M name=DESCARGA_RESIDENCIAL_F.O_PLAN_0_G1 packet-mark=\
    Res_F.O_PLAN0_G1_PACK parent=global priority=2 queue=PLAN0_GPON_20M
/snmp community
set [ find default=yes ] name=GlobalNet
/interface bridge port
add bridge=COM_SERVERS interface=ether10
add bridge=COM_SERVERS disabled=yes interface=ether9
/interface bridge settings
set use-ip-firewall=yes use-ip-firewall-for-vlan=yes
/interface detect-internet
set detect-interface-list=all
/ip address
add address=45.236.151.150/28 comment="WAN 0" interface=loopback network=\
    45.236.151.144
add address=10.106.1.117/30 comment="GESTION OLT" interface=vlan200 network=\
    10.106.1.116
add address=10.20.0.254/24 interface=vlan2000_Bonding network=10.20.0.0
add address=10.20.1.254/24 interface=vlan2001_Bonding network=10.20.1.0
add address=10.20.2.254/24 interface=vlan2002_Bonding network=10.20.2.0
add address=10.20.3.254/24 interface=vlan2003_Bonding network=10.20.3.0
add address=10.20.4.254/24 interface=vlan2004_Bonding network=10.20.4.0
add address=10.20.5.254/24 interface=vlan2005_Bonding network=10.20.5.0
add address=10.20.6.254/24 interface=vlan2006_Bonding network=10.20.6.0
add address=10.20.7.254/24 interface=vlan2007_Bonding network=10.20.7.0
add address=10.20.8.254/24 interface=vlan2008_Bonding network=10.20.8.0
add address=10.20.9.254/24 interface=vlan2009_Bonding network=10.20.9.0
add address=10.20.10.254/24 interface=vlan2010_Bonding network=10.20.10.0
add address=10.20.11.254/24 interface=vlan2011_Bonding network=10.20.11.0
add address=10.20.12.254/24 interface=vlan2012_Bonding network=10.20.12.0
add address=10.20.13.254/24 interface=vlan2013_Bonding network=10.20.13.0
add address=10.20.14.254/24 interface=vlan2014_Bonding network=10.20.14.0
add address=10.20.15.254/24 interface=vlan2015_Bonding network=10.20.15.0
add address=45.236.151.151/28 comment="WAN 1" interface=loopback network=\
    45.236.151.144
add address=45.236.151.152/28 comment="WAN 2" interface=loopback network=\
    45.236.151.144
add address=10.20.100.1/30 comment="CLIENTE GASOLINERA" interface=ether12 \
    network=10.20.100.0
add address=10.20.100.5/30 comment="OFICINA ROUTER" interface=ether11 \
    network=10.20.100.4
add address=10.106.1.73/30 comment="SERVER FISICO" interface=ether10 network=\
    10.106.1.72
add address=10.20.100.9/30 comment="RED PARA ACCEDER DESDE CASA" interface=\
    vlan2005_Bonding network=10.20.100.8
add address=192.168.135.1/29 comment="SERVER VIRTUAL" interface=ether10 \
    network=192.168.135.0
add address=10.20.16.254/24 interface=vlan2016_Bonding network=10.20.16.0
add address=10.20.17.254/24 interface=vlan2017_Bonding network=10.20.17.0
add address=10.20.18.254/24 interface=vlan2018_Bonding network=10.20.18.0
add address=10.20.30.150/30 comment="Canal Datos a Totoracocha" interface=\
    TUNNEL_TOTORACOCHA_OTT network=10.20.30.148
add address=10.172.0.58/30 comment="COMUNICACION TO MISICATA" interface=\
    vlan3515_sfp2 network=10.172.0.56
add address=192.168.200.1/24 interface=LO network=192.168.200.0
add address=10.106.1.77/30 comment="SERVER KHOMP" interface=ether9 network=\
    10.106.1.76
add address=10.20.19.254/24 interface=vlan2019_Bonding network=10.20.19.0
add address=45.236.151.153/28 comment="WAN 3" interface=loopback network=\
    45.236.151.144
add address=45.236.151.154/28 comment="WAN 4" interface=loopback network=\
    45.236.151.144
add address=45.236.151.155/28 comment="WAN 5" interface=loopback network=\
    45.236.151.144
/ip dns
set servers=8.8.8.8,8.8.4.4
/ip firewall address-list
add address=10.20.0.0/24 list=PUBLICAS_CONEXION
add address=10.20.1.0/24 list=PUBLICAS_CONEXION
add address=10.20.2.0/24 list=PUBLICAS_CONEXION
add address=10.20.3.0/24 list=PUBLICAS_CONEXION
add address=10.20.4.0/24 list=PUBLICAS_CONEXION
add address=10.20.5.0/24 list=PUBLICAS_CONEXION
add address=10.20.6.0/24 list=PUBLICAS_CONEXION
add address=10.20.7.0/24 list=PUBLICAS_CONEXION
add address=10.20.8.0/24 list=PUBLICAS_CONEXION
add address=10.20.9.0/24 list=PUBLICAS_CONEXION
add address=10.20.10.0/24 list=PUBLICAS_CONEXION
add address=10.20.11.0/24 list=PUBLICAS_CONEXION
add address=10.20.12.0/24 list=PUBLICAS_CONEXION
add address=10.20.13.0/24 list=PUBLICAS_CONEXION
add address=10.20.14.0/24 list=PUBLICAS_CONEXION
add address=10.20.15.0/24 list=PUBLICAS_CONEXION
add address=45.236.151.0/24 comment=TOTORA list=permitidos
add address=172.18.17.2 comment="OFICINA MISICATA" list=permitidos
add address=8.8.8.8 comment=TOTORA list=permitidos
add address=8.8.4.4 comment=TOTORA list=permitidos
add address=1.1.1.1 comment=TOTORA list=permitidos
add address=10.20.100.2 comment="CLIENTE GASOLINERA" list=PUBLICAS_CONEXION
add address=10.20.100.2 comment="SERVICENTRO ORDONEZ LAZO CORP 1" list=\
    "Corporativo 1"
add address=190.57.141.18 comment="RED GASOLINERA PUNTONET" list=permitidos
add address=10.20.4.5 comment="GUTAMA VILLA NANCY BEATRIZ\
    \n" list=clientes_cuenca
add address=191.100.251.44 comment="ETAPA PEDRO" list=permitidos
add address=10.20.100.4/30 comment="OFICINA GASOLINERA" list=permitidos
add address=10.20.100.6 comment="CLIENTE OFICINA" list=PUBLICAS_CONEXION
add address=10.20.4.9 comment="UYAGUARI PACHAR  LOURDES CELINA" list=\
    clientes_cuenca
add address=10.20.5.1 comment="GIL JARA JAVIER OSWALDO" list=clientes_cuenca
add address=10.20.6.2 comment="ALVAREZ ARMIJOS BRAULIO GERMAN" list=\
    clientes_cuenca
add address=10.20.5.3 comment=FOXGYM list=clientes_cuenca
add address=10.20.6.3 comment="TENEMEA JOSE ANTONIO" list=clientes_cuenca
add address=10.20.5.4 comment="ENCALADA LOJA CHRISTIAN AUGUSTO" list=\
    clientes_cuenca
add address=10.106.1.74 comment="SERVER OFICINA" list=PUBLICAS_CONEXION
add address=10.20.12.1 comment="ALVARADO VICUNA ABSALON ALPIANO" list=\
    clientes_cuenca
add address=10.20.0.2 comment="VELETANGA GUANGA RUTH CECILIA" list=\
    clientes_cuenca
add address=10.20.10.2 comment="NIVICELA ORTIZ ROBINSON ALEXANDER" list=\
    Suspendido
add address=10.20.9.1 comment="NARVAEZ BARBECHO FREDY NESTOR" list=\
    clientes_cuenca
add address=10.20.5.2 comment="CASA PEDRO" list=permitidos
add address=10.20.4.14 comment="PILLCO GUAMAN LILIA MARIBEL " list=\
    clientes_cuenca
add address=10.20.2.4 comment="PATINO CARPIO NANCI MARLENE" list=\
    clientes_cuenca
add address=10.20.2.5 comment="ENCALADA RIERA CLAUDIO FERNANDO" list=\
    clientes_cuenca
add address=174.142.221.77 comment="CONEXION SISTEMA MINEGOCIO" list=\
    permitidos
add address=10.20.8.2 comment="PARRA TAPIA PAUL SEBASTIAN" list=\
    clientes_cuenca
add address=10.20.4.19 comment="CORTEZ DELGADO NORMA EULALIA" list=\
    clientes_cuenca
add address=10.20.5.1 comment="CASA OSWALDO" list=permitidos
add address=10.20.11.5 comment="VALDIVIESO VALDIVIESO MANUEL IGNACIO" list=\
    Suspendido
add address=10.20.8.5 comment="FIGUEROA PUMACURI FANNY RAQUEL" list=\
    clientes_cuenca
add address=10.20.5.2 list=free
add address=10.20.7.3 comment="JIJON RAMIREZ BLANCA YOLANDA" list=\
    clientes_cuenca
add address=10.20.8.6 comment="GORDILLO CONTRERAS JAIME ANDRES" list=\
    clientes_cuenca
add address=10.20.5.5 comment="CORO JARAMA NELLY SANDRA" list=clientes_cuenca
add address=10.20.0.4 comment="TIGRE ZHIZHPON BLANCA LORENA" list=\
    clientes_cuenca
add address=10.20.11.3 comment=OFICINA list=permitidos
add address=74.125.21.16 comment=EMAIL list=permitidos
add address=129.6.15.28 comment=CLOCK list=permitidos
add address=129.6.15.29 comment=CLOCK list=permitidos
add address=88.147.254.230 comment=CLOCK list=permitidos
add address=88.147.254.235 comment=CLOCK list=permitidos
add address=10.20.13.1 comment="ARIAS RIVERA MANUEL GERARDO" list=\
    clientes_cuenca
add address=10.20.13.2 comment="BARRERA SALAMEA DANIELA ESTEFANIA" list=\
    clientes_cuenca
add address=10.20.13.3 comment="FERNANDEZ CHAMBA MARIA BENEDICTA " list=\
    clientes_cuenca
add address=10.20.100.10 comment="CLIENTE CASA PEDRO" list=PUBLICAS_CONEXION
add address=10.20.100.10 comment="CASA PEDRO 2" list=permitidos
add address=10.20.100.10 comment="GIL PENAFIEL PEDRO DAVID" list=\
    clientes_cuenca
add address=10.20.9.2 comment="PACHECO PACHECO OSCAR TOMAS" list=\
    clientes_cuenca
add address=10.20.7.5 comment="TOLEDO PACHECO CLARA CELINDA" list=\
    clientes_cuenca
add address=10.20.4.25 comment="PUIN CENTENO DELIA EULALIA\
    \n" list=clientes_cuenca
add address=10.20.5.7 comment="ZHICAY FAREZ MANUEL SALVADOR" list=\
    clientes_cuenca
add address=10.20.13.4 comment="STEINEBACHER QUITUISACA SANDRA CAROLINA" \
    list=clientes_cuenca
add address=10.20.5.8 comment="JARA TORRES ANGEL GEOVANNI" list=\
    clientes_cuenca
add address=10.20.16.1 comment="MARQUEZ RETO FAUSTO MODESTO" list=\
    clientes_cuenca
add address=192.168.135.2 comment="MAQUINA VIRTUAL WINDOWS 10 " list=\
    PUBLICAS_CONEXION
add address=10.20.16.0/24 list=PUBLICAS_CONEXION
add address=10.20.17.0/24 list=PUBLICAS_CONEXION
add address=192.168.135.3 comment="MAQUINA VIRTUAL SERVER UBUNTU" list=\
    PUBLICAS_CONEXION
add address=10.20.16.2 comment="VALLA YAUTIBUG MANUEL" list=clientes_cuenca
add address=10.20.9.3 comment="DELGADO MACAO RUPERTO JUSTINO" list=\
    clientes_cuenca
add address=10.20.11.17 comment="PACHECO GARCIA MAYRA KARINA" list=\
    clientes_cuenca
add address=192.168.135.2 comment="SERVER OFICINA UBUNTU" list=permitidos
add address=10.106.1.74 comment="SERVER OFICINA" list=permitidos
add address=10.20.4.3 comment="SALTO BANEGAS ROSENDO MOISES" list=\
    clientes_cuenca
add address=minegocioec.com list=permitidos
add address=10.20.7.4 comment="QUITUISACA CABRERA KAREN ESTHEFANY" list=\
    clientes_cuenca
add address=10.20.0.3 comment="DIAZ BOSCAN RODULFO ANTONIO" list=\
    clientes_cuenca
add address=10.20.9.5 comment="LOPEZ PELAEZ JORGUE LEONARDO" list=Suspendido
add address=10.20.17.2 comment="GIL PENAFIEL MARIA ISABEL" list=\
    clientes_cuenca
add address=10.20.18.0/24 list=PUBLICAS_CONEXION
add address=10.20.12.3 comment="REINOSO CABRERA MARIBEL RAQUEL" list=\
    clientes_cuenca
add address=10.20.9.6 comment="BERMEO RENDON XAVIER ADRIAN" list=\
    clientes_cuenca
add address=10.20.13.6 comment="SAQUICELA PENA AIDA GERARDINA" list=\
    clientes_cuenca
add address=10.20.11.10 comment="BIODIAGNOSTICLAB SAS" list=clientes_cuenca
add address=10.20.9.7 comment="AMORES PATINO KARINA DENISSE" list=\
    clientes_cuenca
add address=10.20.0.6 comment="PEREZ ARIAS EDWIN JOSE" list=clientes_cuenca
add address=10.20.4.7 comment="QUITO ALVAREZ SONIA CATALINA" list=\
    clientes_cuenca
add address=10.20.8.8 comment="CONTRERAS GOMEZ CLARA HERLINDA" list=\
    clientes_cuenca
add address=10.20.5.11 comment="ARAUJO CEDILLO RAQUEL HERMINIA\
    \n" list=clientes_cuenca
add address=10.20.5.1 comment="bloquear oswal" list=tik
add address=10.20.18.2 comment="DELGADO TELLO PAUL DANILO" list=\
    clientes_cuenca
add address=10.20.13.8 comment="LOJA ANA GABRIELA" list=clientes_cuenca
add address=10.20.9.9 comment=RODRIGUEZ-RODRIGUEZ-NANCY-MARIANA list=\
    clientes_cuenca
add address=192.168.20.0/24 list=PUBLICAS_CONEXION
add address=10.20.16.9 comment="Break Point Padel Club" list=clientes_cuenca
add address=10.20.13.10 comment="JARAMILLO PIZARRO GINO GEOVANNY" list=\
    clientes_cuenca
add address=10.20.7.6 comment="ERRAEZ SUCONOTA OLGA MARIBEL" list=\
    clientes_cuenca
add address=10.20.4.36 comment="CACERES SACA ADRIAN MESIAS" list=\
    clientes_cuenca
add address=10.20.17.4 comment="CULCAY TUBA LUIS ISAAC" list=clientes_cuenca
add address=10.20.11.2 comment="MARIA GUADALUPE PAUTA" list=clientes_cuenca
add address=10.20.11.6 comment="AUZ BAUTISTA KATHERINE ELIZABETH" list=\
    clientes_cuenca
add address=10.20.1.1 comment="ANGUISACA PRADO JAIME WILFRIDO" list=\
    clientes_cuenca
add address=10.20.11.11 comment="SEGARRA SOLANO LIA NOEMI" list=\
    clientes_cuenca
add address=10.106.1.78 comment="SERVER ARPEGIO" list=PUBLICAS_CONEXION
add address=10.20.2.7 comment="MUNDOWEB CALVA CRISTINA" list=clientes_cuenca
add address=10.20.7.7 comment="PEREZ PESANTEZ JHON ALEXANDER" list=Suspendido
add address=185.57.217.0/24 comment="EMNIFY USEAST 1" list=permitidosGSM
add address=52.86.140.195 comment="EMNIFY USEAST 1" list=permitidosGSM
add address=34.230.244.239 comment="EMNIFY USEAST 1" list=permitidosGSM
add address=10.20.100.10 comment=PEDRO list=permitidosGSM
add address=10.20.7.9 comment="AGUAYZA TOLEDO CARMEN JACQUELINE" list=\
    clientes_cuenca
add address=10.20.11.7 comment="AMORES MERCHAN SILVIA DE LOURDES" list=\
    clientes_cuenca
add address=10.20.11.8 comment="SANCHEZ MEJIA KATHERINE PRISCILA " list=\
    clientes_cuenca
add address=10.20.0.9 comment="TIGRE ZHIZPHPON NUBE MELANIA" list=\
    clientes_cuenca
add address=10.20.1.3 comment="MENDEZ FUELA VERONICA MERCEDES " list=\
    clientes_cuenca
add address=10.20.2.8 comment="PINTADO TENESACA MARIA MERCEDES" list=\
    clientes_cuenca
add address=10.20.9.12 comment="PACHECO GARCIA MAYRA KARINA " list=\
    clientes_cuenca
add address=10.20.9.13 comment="SERRANO QUEZADA JHONATAN STEVEN" list=\
    clientes_cuenca
add address=10.20.5.6 comment="CABRERA BRAVO EDUARDO" list=clientes_cuenca
add address=10.20.19.0/24 list=PUBLICAS_CONEXION
add address=10.20.13.17 comment="LOJA LOJA SANDRA MARIA" list=clientes_cuenca
add address=10.20.12.4 comment="MOLINA ENCALADA NANCY ELIZABETH" list=\
    clientes_cuenca
add address=10.20.0.1 comment="ROLDAN CONDO CARMEN DOLORES" list=\
    clientes_cuenca
add address=10.20.17.1 comment="SACAQUIRIN ALVARADO ERIKA VALERIA" list=\
    clientes_cuenca
add address=10.20.13.5 comment="DIANA ANGELICA IDROVO SISALIMA" list=\
    clientes_cuenca
add address=10.20.9.8 comment="QUEZADA SERRANO MARK LEONARDO" list=\
    clientes_cuenca
add address=10.20.4.33 comment="SANCHEZ QUITO BRYAN ALEXANDER" list=\
    clientes_cuenca
add address=10.20.5.9 comment="QUIZHPILEMA MARIN SAMANTHA KATHERINE" list=\
    clientes_cuenca
add address=10.20.16.3 comment="MUNOZ LOJA JUAN CARLOS" list=clientes_cuenca
add address=10.20.16.5 comment="QUIZHPI VINUEZA HUGO MARCELO" list=\
    clientes_cuenca
add address=10.106.1.75 comment="SERVER OFICINA" list=PUBLICAS_CONEXION
add address=10.20.2.11 comment="BARRETO CORONEL LORENA NATALY" list=\
    clientes_cuenca
add address=10.20.11.15 comment="RAMON ORTEGA RITA MARICELA" list=\
    clientes_cuenca
add address=10.20.11.16 comment="BASURTO CHAVEZ ANGEL AGUSTIN" list=\
    Suspendido
add address=10.20.7.2 comment="SANMARTIN RIERA GALO ESTEBAN" list=\
    clientes_cuenca
add address=10.20.7.1 comment="JUNCAL QUITUISACA FANNY MARIBEL\r\
    \n" list=clientes_cuenca
add address=10.20.7.10 comment="TUMBACO SARMIENTO MARIO ANTONIO" list=\
    clientes_cuenca
add address=10.20.13.7 comment="FAJARDO MOSQUERA AURELIO CORNELIO" list=\
    clientes_cuenca
add address=10.20.3.1 comment="BUENO AVALOS FRANCISCO XAVIER" list=\
    clientes_cuenca
add address=10.20.7.12 comment="GUERRERO TIGRE MARIA FLORINDA" list=\
    clientes_cuenca
add address=10.20.18.4 comment="GARCIA RAMIREZ MARIA ELENA" list=\
    clientes_cuenca
add address=10.20.4.31 comment="PACHECO PACHECO JOHANA PRISCILA" list=\
    Suspendido
add address=10.20.7.14 comment="ORTIZ FEIJOO RENATA SOFIA" list=\
    clientes_cuenca
add address=10.20.7.15 comment="CONTRERAS MONTALVAN XAVIER MARCELO" list=\
    clientes_cuenca
add address=10.20.8.3 comment="MONTALVAN VALLADAREZ ANGEL RIGOBERTO" list=\
    clientes_cuenca
add address=10.20.18.5 comment="CEDILLO GUERRERO MANUEL HUMBERTO" list=\
    clientes_cuenca
add address=10.20.11.19 comment="CORTEZ DELGADO MARLENE ELIZABETH" list=\
    clientes_cuenca
add address=10.20.4.10 comment="ANGUISACA PRADO JAIME WILFRIDO" list=\
    clientes_cuenca
add address=10.20.9.15 comment="PAREDES MENDEZ MAYRA ALEJANDRA" list=\
    clientes_cuenca
add address=10.20.4.45 comment="GUANGA VELETANGA MIRIAN EULALIA" list=\
    clientes_cuenca
add address=10.20.7.13 comment="CEDILLO GUERRERO MANUEL HUMBERTO" list=\
    clientes_cuenca
add address=10.20.18.10 comment="MOSCOSO HARRIS JUAN DIEGO" list=\
    clientes_cuenca
add address=10.20.7.11 comment="PANGOL LEON DIEGO XAVIER" list=\
    clientes_cuenca
add address=10.20.4.16 comment="PUIN CENTENO JUAN CARLOS" list=\
    clientes_cuenca
add address=10.20.11.4 comment="FIGUEROA TOMALA HECTOR BOLIVAR" list=\
    clientes_cuenca
add address=10.20.9.10 comment="PICON RIVAS MARCO ANTONIO" list=\
    clientes_cuenca
add address=10.20.13.14 comment="MOROCHO ASHQUI LUIS OCTAVIO" list=\
    clientes_cuenca
add address=10.20.4.1 comment="SANCHEZ TOLEDO DANIELA PATRICIA" list=\
    clientes_cuenca
add address=10.20.13.11 comment="CALLE PARRA OLGA MARIETA" list=\
    clientes_cuenca
add address=10.20.8.1 comment="CRIOLLO OCHOA ROMULO GUSTAVO" list=\
    clientes_cuenca
add address=10.20.16.8 comment="CABRERA BAUTISTA TANNYA PRISCILA" list=\
    clientes_cuenca
add address=10.20.8.4 comment="QUEZADA QUEZADA JOSUELITO RAFAEL" list=\
    Suspendido
add address=10.20.0.7 comment="ZHINDON LOZANO STALIN ISRAEL" list=\
    clientes_cuenca
add address=10.20.17.3 comment="TOLEDO PACHECO VALERIA CRISTINA" list=\
    Suspendido
add address=10.20.13.18 comment="CABRERA TIGRE FAUSTO LUISIANO" list=\
    clientes_cuenca
add address=10.20.4.4 comment="ROBLES FAJARDO ISABEL CAROLINA" list=\
    clientes_cuenca
add address=10.20.7.8 comment="NIEVES LUCERO DORIS NATALY" list=\
    clientes_cuenca
add address=10.20.11.14 comment="ZUMBA PENALOZA ROSA LIDUVINA" list=\
    clientes_cuenca
add address=10.20.16.10 comment="CHACHA CHACHA CLAUDIA VERONICA" list=\
    clientes_cuenca
add address=10.20.13.13 comment="ILLESCAS CRIOLLO MANUEL RAMIRO" list=\
    clientes_cuenca
add address=10.20.4.6 comment="GARCIA GUEVARA LUIS HIPOLITO" list=\
    clientes_cuenca
add address=10.20.11.3 comment="QUIMI TOMALA MILTON JULIAN" list=\
    clientes_cuenca
add address=10.20.9.16 comment="CHIMBO BORJA VICTOR MAURICIO" list=\
    clientes_cuenca
add address=10.20.18.3 comment="PAGUAY YUPA JANNETH PATRICIA\r\
    \n" list=clientes_cuenca
add address=globalnetcontrol.gtelecomtech.com list=permitidos
add address=174.142.221.69 comment="SERVIDOR EDAM" list=permitidos
add address=10.20.16.6 comment="CORTES DELGADO BLANCA AZUCENA " list=\
    clientes_cuenca
add address=10.20.6.5 comment="BACULIMA CONTRERAS JOSE OCTAVIO" list=\
    clientes_cuenca
add address=10.20.2.3 comment="QUEZADA UREA FLAVIO DE JESUS CASA" list=\
    clientes_cuenca
add address=10.20.2.2 comment="QUEZADA UREA FLAVIO DE JESUS LOCAL" list=\
    clientes_cuenca
add address=10.20.0.11 comment="VELETANGA GUANGA MARISELA ALEXANDRA" list=\
    clientes_cuenca
add address=10.20.16.11 comment="PALACIOS SERRANO TITO IVAN" list=\
    clientes_cuenca
add address=10.20.9.17 comment="GUZMAN BARROS PABLO SANTIAGO" list=\
    clientes_cuenca
add address=10.106.1.46 comment="SERVER TV" list=permitidos
add address=10.172.0.68/30 comment="PERMITIDOS RED OTT TOTORA" list=\
    permitidos
add address=10.20.100.6 comment="CLIENTE OFICINA" disabled=yes list=\
    45.236.151.155
add address=10.20.4.11 comment="GUALLPA PALAGUACHI ANA LUCIA" list=\
    clientes_cuenca
add address=10.20.18.1 comment="BOSCAN ARRIETA MARIA EUGENIA" list=\
    clientes_cuenca
add address=10.20.18.6 comment="ALBARRACIN YUPA MARIA MERCEDES" list=\
    clientes_cuenca
add address=10.20.2.1 comment="PACURUCU ORTEGA SANDRO MANUEL" list=\
    clientes_cuenca
add address=10.20.0.5 comment="CASTRO TORRES SERGIO DARIO" list=\
    clientes_cuenca
add address=10.20.12.2 comment="MONTESDEOCA CUMBE KARINA ARACELY" list=\
    clientes_cuenca
add address=10.20.4.12 comment="PICON RIVAS MARCO ANTONIO ENLACE 2" list=\
    clientes_cuenca
add address=10.20.5.10 comment="PALAGUACHI GUZMAN JONATHAN GEORGE" list=\
    clientes_cuenca
add address=10.20.4.13 comment="MONTERO CARDENAS ANA LUCIA" list=\
    clientes_cuenca
add address=10.20.17.7 comment="QUINCHE QUISHPI MARIA CRISTINA" list=\
    clientes_cuenca
add address=10.20.18.7 comment="RIERA BERMEO ZAIDA LUZMILA" list=\
    clientes_cuenca
add address=10.20.4.15 comment="BERMEO MORALES ALEX DARIO" list=\
    clientes_cuenca
add address=10.20.10.1 comment="AZUERO TAMAYO AILEN CAMILA" list=\
    clientes_cuenca
add address=10.20.6.1 comment="MOROCHO SACA SISA PACARIC" list=\
    clientes_cuenca
add address=10.20.16.4 comment="ENCALADA ACOSTA STEPHANY ELIZABETH" list=\
    clientes_cuenca
add address=10.20.1.2 comment="ESPINOZA AGUIRRE LUPE MARILU" list=\
    clientes_cuenca
add address=10.20.4.32 comment="BENAVIDES PEREZ ALLISON ALEXANDRA" list=\
    clientes_cuenca
add address=10.20.13.9 comment=ONT-WILFRIDO-MARCELO-NIEVES-MOROCHO list=\
    clientes_cuenca
add address=10.20.19.1 comment="ORELLANA BARRERA MARIA JOSEFINA ENLACE 2" \
    list=clientes_cuenca
add address=10.20.6.4 comment="LEON MENDEZ DANIELA MARIA" list=\
    clientes_cuenca
add address=10.20.8.7 comment="DIAZ MARTINEZ MANUEL ERNESTO" list=\
    clientes_cuenca
add address=10.20.11.12 comment=ONT-JULIA-DOLORES-PORTILLA-MENDOZA list=\
    clientes_cuenca
add address=10.20.9.14 comment=ONT-RUBIO-BENITO-PALACIOS-PACHECO list=\
    clientes_cuenca
add address=10.20.11.1 comment="BRAVO AREVALO ANGELA LILIANA" list=\
    clientes_cuenca
add address=10.20.4.17 comment="CHUYA GUITIERREZ JOSE DANIEL" list=\
    clientes_cuenca
add address=10.20.11.13 comment=ONT-DANIEL-TEODORO-CARDENAS-CAMPOS list=\
    clientes_cuenca
add address=10.20.7.16 comment="DURAN DURAN NELY CARMITA" list=\
    clientes_cuenca
add address=10.20.11.9 comment=ONT-DANIEL-TEODORO-CARDENAS-CAMPOS list=\
    clientes_cuenca
add address=10.20.3.3 comment="SANGURIMA CHOGLLO ELSA LEONOR" list=\
    clientes_cuenca
add address=10.20.4.18 comment=ONT-HIDALGO-LOPEZ-YORMAN-ALEXANDER list=\
    clientes_cuenca
add address=10.20.6.10 comment="VACACELA AJILA MARIANA DE JESUS\r\
    \n" list=clientes_cuenca
/ip firewall filter
add action=add-src-to-address-list address-list=port:3001 \
    address-list-timeout=1m chain=input dst-port=3001 protocol=tcp
add action=add-src-to-address-list address-list=permitidos-app \
    address-list-timeout=2m chain=input dst-port=4001 protocol=tcp \
    src-address-list=port:3001
add action=drop chain=forward comment="BLOCK TIKTOK" dst-port="" \
    layer7-protocol=Tiktok protocol=tcp src-address-list=tik
add action=drop chain=forward comment="Block Rule" disabled=yes protocol=tcp \
    src-address-list=Suspendido
add action=drop chain=forward comment="Block Rule" protocol=udp \
    src-address-list=Suspendido
add action=accept chain=input in-interface=vlan3515_sfp2 src-address-list=\
    permitidos
add action=accept chain=output dst-address-list=permitidos out-interface=\
    vlan3515_sfp2
add action=fasttrack-connection chain=forward connection-state=\
    established,related
add action=accept chain=forward connection-state=established,related
add action=accept chain=forward src-address-list=permitidos
add action=accept chain=forward
add action=drop chain=input in-interface=vlan3515_sfp2 src-address-list=\
    !permitidos
add action=drop chain=input comment=P21 dst-port=21 protocol=tcp \
    src-address-list=!permitidos
add action=drop chain=input comment=P22 dst-port=22 protocol=tcp \
    src-address-list=!permitidos
add action=drop chain=input comment=P23 dst-port=23 protocol=tcp \
    src-address-list=!permitidos
add action=drop chain=input comment=P80 dst-port=80 protocol=tcp \
    src-address-list=!permitidos
add action=drop chain=input comment=P8728 dst-port=8728 protocol=tcp \
    src-address-list=!permitidos
add action=drop chain=input comment="PUERTO 25" connection-limit=100,32 \
    dst-limit=1,5,dst-address/1m40s dst-port=25 limit=1,5:packet protocol=tcp \
    psd=21,3s,3,1 src-address-type="" time=0s-1d,sun,mon,tue,wed,thu,fri,sat
add action=drop chain=output comment="PUERTO 25" connection-limit=100,32 \
    dst-limit=1,5,dst-address/1m40s dst-port=25 limit=1,5:packet protocol=tcp \
    psd=21,3s,3,1
add action=drop chain=forward comment="PUERTO 25" connection-limit=100,32 \
    limit=1,5:packet port=25 protocol=tcp
add action=tarpit chain=input comment="***************************************\
    ***************************************************DDOS*******************\
    ************************************" connection-limit=3,32 limit=\
    1,5:packet protocol=tcp src-address-list=DoS_listBLACK
add action=add-src-to-address-list address-list=DoS_listBLACK \
    address-list-timeout=1d1h chain=input comment=DOS_LISTBLACK \
    connection-limit=25,32 protocol=tcp
add action=jump chain=forward comment="SYN Flood protect" connection-limit=\
    100,32 connection-state=new jump-target=SYN-Protect protocol=tcp
add action=accept chain=SYN-Protect connection-limit=100,32 connection-state=\
    new limit=400,5:packet protocol=tcp
add action=drop chain=SYN-Protect connection-limit=100,32 connection-state=\
    new limit=1,5:packet protocol=tcp
/ip firewall nat
add action=src-nat chain=srcnat comment="NAT TO WAN0" disabled=yes \
    out-interface=vlan3515_sfp2 src-address-list="PUBLICA WAN0" to-addresses=\
    45.236.151.151
add action=src-nat chain=srcnat comment="NAT TO WAN1" disabled=yes \
    out-interface=vlan3515_sfp2 src-address-list="PUBLICA WAN1" to-addresses=\
    45.236.151.151
add action=src-nat chain=srcnat comment="NAT TO WAN2" disabled=yes \
    out-interface=vlan3515_sfp2 src-address-list="PUBLICA WAN2" to-addresses=\
    45.236.151.152
add action=same chain=srcnat comment="PASAR TRAFICO POR UNA IP EN ESPECIFICO" \
    same-not-by-dst=no src-address-list=45.236.151.155 to-addresses=\
    45.236.151.155
add action=same chain=srcnat comment="*************************************TRA\
    FICO DE CLIENTES POR PUBLICAS DE NEDETEL SAME*****************************\
    ********" out-interface=vlan3515_sfp2 same-not-by-dst=no \
    src-address-list=PUBLICAS_CONEXION to-addresses=\
    45.236.151.150-45.236.151.154
add action=dst-nat chain=dstnat comment="DIRECCIONAMIENTO AL SERVER " \
    disabled=yes dst-port=9095 protocol=tcp src-address-list=permitidos \
    to-addresses=192.168.135.3 to-ports=9095
add action=src-nat chain=srcnat comment="NAT PARA ENMASCARAR GATEWAYS" \
    dst-address=181.196.184.244 to-addresses=45.236.151.150
add action=dst-nat chain=dstnat comment=\
    "DIRECCIONAMIENTO AL SERVER ARPEGIO STE" dst-port=9915 protocol=udp \
    to-addresses=181.196.184.244 to-ports=9915
add action=dst-nat chain=dstnat comment=\
    "DIRECCIONAMIENTO AL SERVER ARPEGIO ESM" dst-port=9916 protocol=udp \
    to-addresses=181.196.184.244 to-ports=9916
add action=dst-nat chain=dstnat comment=\
    "DIRECCIONAMIENTO AL SERVER ARPEGIO CHONGON" dst-port=9921 protocol=udp \
    to-addresses=181.196.184.244 to-ports=9921
add action=dst-nat chain=dstnat comment=\
    "DIRECCIONAMIENTO AL SERVER ARPEGIO GLR" dst-port=9917 protocol=udp \
    to-addresses=181.196.184.244 to-ports=9917
add action=dst-nat chain=dstnat comment=\
    "DIRECCIONAMIENTO AL SERVER ARPEGIO MLG" dst-port=9918 protocol=udp \
    to-addresses=181.196.184.244 to-ports=9918
add action=dst-nat chain=dstnat comment="DIRECCIONAMIENTO A Zkteko" disabled=\
    yes dst-address=45.236.151.150 dst-port=9095 protocol=tcp \
    src-address-list=permitidos-app to-addresses=10.106.1.74 to-ports=9095
add action=dst-nat chain=dstnat comment=\
    "DIRECCIONAMIENTO A sistema NO HABILITAR NUEVAMENTE" dst-port=4443 \
    protocol=tcp to-addresses=192.168.135.2 to-ports=4443
add action=dst-nat chain=dstnat comment="DIRECCIONAMIENTO VPN" disabled=yes \
    dst-port=51820 protocol=udp to-addresses=192.168.135.2 to-ports=51820
add action=dst-nat chain=dstnat comment=\
    "DIRECCIONAMIENTO A sistema de rastreo NO HABILITAR" disabled=yes \
    dst-port=8082 protocol=tcp to-addresses=10.106.1.78 to-ports=8082
add action=dst-nat chain=dstnat comment=\
    "DIRECCIONAMIENTO A sistema de rastreo" dst-port=5001 protocol=tcp \
    to-addresses=192.168.135.2 to-ports=5001
add action=dst-nat chain=dstnat comment=\
    "DIRECCIONAMIENTO A sistema de rastreo" dst-port=5055 protocol=tcp \
    to-addresses=192.168.135.2 to-ports=5055
add action=dst-nat chain=dstnat comment=\
    "DIRECCIONAMIENTO A sistema de rastreo" dst-port=9050 protocol=tcp \
    to-addresses=192.168.135.2 to-ports=9050
add action=dst-nat chain=dstnat comment=\
    "DIRECCIONAMIENTO AL SERVER ARPEGIO SUC" dst-port=9919 protocol=udp \
    to-addresses=10.20.100.10 to-ports=9919
/ip route
add distance=1 gateway=10.172.0.57
add disabled=yes distance=1 gateway=45.236.151.129
add comment="RUTA PARA LLEGAR IPTV TOTORA" distance=1 dst-address=\
    10.106.1.44/30 gateway=10.20.30.149
add comment="RUTA PARA LLEGAR A TOTORACOCHA" disabled=yes distance=1 \
    dst-address=10.172.0.16/30 gateway=10.172.0.57
add comment="RUTA PARA LLEGAR A TOTORACOCHA IPTV" distance=1 dst-address=\
    10.172.0.68/30 gateway=10.172.0.57
add distance=1 dst-address=192.168.1.0/24 gateway=10.20.100.10
add disabled=yes distance=1 dst-address=192.168.100.0/24 gateway=10.20.100.10
/ip service
set telnet disabled=yes
set ftp disabled=yes
set www disabled=yes port=8002
set www-ssl disabled=no port=444
set winbox port=8100
set api-ssl disabled=yes
/ppp aaa
set use-radius=yes
/snmp
set enabled=yes
/system clock
set time-zone-name=America/Guayaquil
/system clock manual
set time-zone=-05:00
/system identity
set name=BORDER_ORDONEZ_LAZO
/system ntp client
set enabled=yes primary-ntp=172.18.17.2 secondary-ntp=172.18.17.2
/system scheduler
add disabled=yes interval=30s name=grafica on-event="/global capacidad [interf\
    ace monitor-traffic sfp2 once as-value];\r\
    \n/global fecha ([system clock get time]);\r\
    \n/global rx [:pick \$capacidad 7];\r\
    \n/global tx [:pick \$capacidad 11];\r\
    \n/file set capacidad.txt contents=([get capacidad.txt contents].\$rx.\",\
    \".\$tx.\",\".\$fecha.\";\")\r\
    \n" policy=\
    ftp,reboot,read,write,policy,test,password,sniff,sensitive,romon \
    start-date=may/24/2022 start-time=18:31:00
add interval=30s name=grafica2 on-event="/global archivo [file get capacidad.t\
    xt contents];\r\
    \n/global primLinea [find \$archivo \";\"];\r\
    \n/global primli (\$primLinea +1);\r\
    \n/global tamanio [len \$archivo];\r\
    \n/global archNu [pick \$archivo \$primli \$tamanio];\r\
    \n/file set capacidad.txt contents=\$archNu\r\
    \n\r\
    \n/global capacidad [interface monitor-traffic sfp2 once as-value];\r\
    \n/global fecha ([system clock get time]);\r\
    \n/global rx [:pick \$capacidad 7];\r\
    \n/global tx [:pick \$capacidad 11];\r\
    \n/file set capacidad.txt contents=([get capacidad.txt contents].\$rx.\",\
    \".\$tx.\",\".\$fecha.\";\")\r\
    \n" policy=\
    ftp,reboot,read,write,policy,test,password,sniff,sensitive,romon \
    start-date=may/24/2022 start-time=21:35:00
add interval=1w name=reinicio on-event=reiniciar policy=\
    ftp,reboot,read,write,policy,test,password,sniff,sensitive,romon \
    start-date=jul/30/2023 start-time=17:34:34
/system script
add dont-require-permissions=no name=script1 owner=pedro policy=\
    ftp,reboot,read,write,policy,test,password,sniff,sensitive,romon source=\
    "/local deviceName [/system identity get name]"
add dont-require-permissions=no name=reiniciar owner=pablo policy=\
    ftp,reboot,read,write,policy,test,password,sniff,sensitive,romon source=\
    "/system reboot"
/tool e-mail
set address=174.142.221.69 from=globalnet@gtelecomtech.com password=\
    Global*2022@ port=587 start-tls=yes user=globalnet@gtelecomtech.com
/tool graphing interface
add
/tool graphing queue
add
/tool graphing resource
add
/tool netwatch
add comment="MONITOREO PRUEBA" down-script="/tool fetch url=\"https://globalne\
    tcontrol.gtelecomtech.com/monitoreoCliente/alerta_enlace.php\?token=!X9&es\
    tado=down\" keep-result=no" host=10.20.5.3 interval=5s up-script="/tool fe\
    tch url=\"https://globalnetcontrol.gtelecomtech.com/monitoreoCliente/alert\
    a_enlace.php\?token=!X9&estado=up\" keep-result=no"
add down-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est DOWN\"" \
    host=10.20.11.9 up-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est UP\""
add down-script=\
    "/log error \"ONT-WILFRIDO-MARCELO-NIEVES-MOROCHO El host est DOWN\"" \
    host=10.20.13.9 up-script=\
    "/log error \"ONT-WILFRIDO-MARCELO-NIEVES-MOROCHO El host est UP\""
add down-script=\
    "/log error \"ONT-JULIA-DOLORES-PORTILLA-MENDOZA El host est DOWN\"" \
    host=10.20.11.12 up-script=\
    "/log error \"ONT-JULIA-DOLORES-PORTILLA-MENDOZA El host est UP\""
add down-script=\
    "/log error \"ONT-RUBIO-BENITO-PALACIOS-PACHECO El host est DOWN\"" host=\
    10.20.9.14 up-script=\
    "/log error \"ONT-RUBIO-BENITO-PALACIOS-PACHECO El host est UP\""
add down-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est DOWN\"" \
    host=10.20.11.9 up-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est UP\""
add down-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est DOWN\"" \
    host=10.20.11.9 up-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est UP\""
add down-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est DOWN\"" \
    host=10.20.11.9 up-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est UP\""
add down-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est DOWN\"" \
    host=10.20.11.13 up-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est UP\""
add down-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est DOWN\"" \
    host=10.20.11.9 up-script=\
    "/log error \"ONT-DANIEL-TEODORO-CARDENAS-CAMPOS El host est UP\""
add down-script=\
    "/log error \"ONT-HIDALGO-LOPEZ-YORMAN-ALEXANDER El host est DOWN\"" \
    host=10.20.4.18 up-script=\
    "/log error \"ONT-HIDALGO-LOPEZ-YORMAN-ALEXANDER El host est UP\""
