FROM crpi-d0x3buemxmymp6j4.cn-guangzhou.personal.cr.aliyuncs.com/vincenzo_jiang/rabbitmq:latest
RUN rabbitmq-plugins enable rabbitmq_management
RUN echo management_agent.disable_metrics_collector = false > /etc/rabbitmq/conf.d/management_agent.disable_metrics_collector.conf