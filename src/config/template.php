<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/8/4
 * Time: 12:47
 */
return [
// +----------------------------------------------------------------------
    // | ģ������
    // +----------------------------------------------------------------------
        // ģ���������� ֧�� php think ֧����չ
        'type'         => 'Think',
        // Ĭ��ģ����Ⱦ���� 1 ����ΪСд+�»��� 2 ȫ��ת��Сд
        'auto_rule'    => 1,
        // ģ��·��
        'view_path'    => '',
        // ģ���׺
        'view_suffix'  => 'html',
        // ģ���ļ����ָ���
        'view_depr'    => DS,
        // ģ��������ͨ��ǩ��ʼ���
        'tpl_begin'    => '{',
        // ģ��������ͨ��ǩ�������
        'tpl_end'      => '}',
        // ��ǩ���ǩ��ʼ���
        'taglib_begin' => '{',
        // ��ǩ���ǩ�������
        'taglib_end'   => '}',
        //ҳ����ʽ·��
        'tpl_replace_string' => [
            '__admin__' =>"/static/admin",
            '__index__' =>"/static/index",
            '__static__' =>"/static",
            '__upload__' =>"/upload",
            '__school__' =>"/static/school",
            '__member__' =>"/static/member",
        ],
];