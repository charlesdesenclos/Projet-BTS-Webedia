/****************************************************************************
** Meta object code from reading C++ file 'Webedia.h'
**
** Created by: The Qt Meta Object Compiler version 67 (Qt 5.14.2)
**
** WARNING! All changes made in this file will be lost!
*****************************************************************************/

#include <memory>
#include "../../../Webedia.h"
#include <QtCore/qbytearray.h>
#include <QtCore/qmetatype.h>
#if !defined(Q_MOC_OUTPUT_REVISION)
#error "The header file 'Webedia.h' doesn't include <QObject>."
#elif Q_MOC_OUTPUT_REVISION != 67
#error "This file was generated using the moc from 5.14.2. It"
#error "cannot be used with the include files from this version of Qt."
#error "(The moc has changed too much.)"
#endif

QT_BEGIN_MOC_NAMESPACE
QT_WARNING_PUSH
QT_WARNING_DISABLE_DEPRECATED
struct qt_meta_stringdata_Webedia_t {
    QByteArrayData data[14];
    char stringdata0[176];
};
#define QT_MOC_LITERAL(idx, ofs, len) \
    Q_STATIC_BYTE_ARRAY_DATA_HEADER_INITIALIZER_WITH_OFFSET(len, \
    qptrdiff(offsetof(qt_meta_stringdata_Webedia_t, stringdata0) + ofs \
        - idx * sizeof(QByteArrayData)) \
    )
static const qt_meta_stringdata_Webedia_t qt_meta_stringdata_Webedia = {
    {
QT_MOC_LITERAL(0, 0, 7), // "Webedia"
QT_MOC_LITERAL(1, 8, 23), // "onCreationButtonClicked"
QT_MOC_LITERAL(2, 32, 0), // ""
QT_MOC_LITERAL(3, 33, 12), // "ConnexionBDD"
QT_MOC_LITERAL(4, 46, 12), // "QSqlDatabase"
QT_MOC_LITERAL(5, 59, 13), // "RequeteInsert"
QT_MOC_LITERAL(6, 73, 2), // "db"
QT_MOC_LITERAL(7, 76, 11), // "name_module"
QT_MOC_LITERAL(8, 88, 13), // "couleur_rouge"
QT_MOC_LITERAL(9, 102, 12), // "couleur_bleu"
QT_MOC_LITERAL(10, 115, 12), // "couleur_vert"
QT_MOC_LITERAL(11, 128, 13), // "id_equipement"
QT_MOC_LITERAL(12, 142, 13), // "RequeteSelect"
QT_MOC_LITERAL(13, 156, 19) // "onListWidgetClicked"

    },
    "Webedia\0onCreationButtonClicked\0\0"
    "ConnexionBDD\0QSqlDatabase\0RequeteInsert\0"
    "db\0name_module\0couleur_rouge\0couleur_bleu\0"
    "couleur_vert\0id_equipement\0RequeteSelect\0"
    "onListWidgetClicked"
};
#undef QT_MOC_LITERAL

static const uint qt_meta_data_Webedia[] = {

 // content:
       8,       // revision
       0,       // classname
       0,    0, // classinfo
       5,   14, // methods
       0,    0, // properties
       0,    0, // enums/sets
       0,    0, // constructors
       0,       // flags
       0,       // signalCount

 // slots: name, argc, parameters, tag, flags
       1,    0,   39,    2, 0x0a /* Public */,
       3,    0,   40,    2, 0x0a /* Public */,
       5,    6,   41,    2, 0x0a /* Public */,
      12,    1,   54,    2, 0x0a /* Public */,
      13,    1,   57,    2, 0x0a /* Public */,

 // slots: parameters
    QMetaType::Void,
    0x80000000 | 4,
    QMetaType::Void, 0x80000000 | 4, QMetaType::QString, QMetaType::QString, QMetaType::QString, QMetaType::QString, QMetaType::QString,    6,    7,    8,    9,   10,   11,
    QMetaType::Void, 0x80000000 | 4,    6,
    QMetaType::QString, 0x80000000 | 4,    6,

       0        // eod
};

void Webedia::qt_static_metacall(QObject *_o, QMetaObject::Call _c, int _id, void **_a)
{
    if (_c == QMetaObject::InvokeMetaMethod) {
        auto *_t = static_cast<Webedia *>(_o);
        Q_UNUSED(_t)
        switch (_id) {
        case 0: _t->onCreationButtonClicked(); break;
        case 1: { QSqlDatabase _r = _t->ConnexionBDD();
            if (_a[0]) *reinterpret_cast< QSqlDatabase*>(_a[0]) = std::move(_r); }  break;
        case 2: _t->RequeteInsert((*reinterpret_cast< QSqlDatabase(*)>(_a[1])),(*reinterpret_cast< QString(*)>(_a[2])),(*reinterpret_cast< QString(*)>(_a[3])),(*reinterpret_cast< QString(*)>(_a[4])),(*reinterpret_cast< QString(*)>(_a[5])),(*reinterpret_cast< QString(*)>(_a[6]))); break;
        case 3: _t->RequeteSelect((*reinterpret_cast< QSqlDatabase(*)>(_a[1]))); break;
        case 4: { QString _r = _t->onListWidgetClicked((*reinterpret_cast< QSqlDatabase(*)>(_a[1])));
            if (_a[0]) *reinterpret_cast< QString*>(_a[0]) = std::move(_r); }  break;
        default: ;
        }
    }
}

QT_INIT_METAOBJECT const QMetaObject Webedia::staticMetaObject = { {
    QMetaObject::SuperData::link<QMainWindow::staticMetaObject>(),
    qt_meta_stringdata_Webedia.data,
    qt_meta_data_Webedia,
    qt_static_metacall,
    nullptr,
    nullptr
} };


const QMetaObject *Webedia::metaObject() const
{
    return QObject::d_ptr->metaObject ? QObject::d_ptr->dynamicMetaObject() : &staticMetaObject;
}

void *Webedia::qt_metacast(const char *_clname)
{
    if (!_clname) return nullptr;
    if (!strcmp(_clname, qt_meta_stringdata_Webedia.stringdata0))
        return static_cast<void*>(this);
    return QMainWindow::qt_metacast(_clname);
}

int Webedia::qt_metacall(QMetaObject::Call _c, int _id, void **_a)
{
    _id = QMainWindow::qt_metacall(_c, _id, _a);
    if (_id < 0)
        return _id;
    if (_c == QMetaObject::InvokeMetaMethod) {
        if (_id < 5)
            qt_static_metacall(this, _c, _id, _a);
        _id -= 5;
    } else if (_c == QMetaObject::RegisterMethodArgumentMetaType) {
        if (_id < 5)
            *reinterpret_cast<int*>(_a[0]) = -1;
        _id -= 5;
    }
    return _id;
}
QT_WARNING_POP
QT_END_MOC_NAMESPACE
