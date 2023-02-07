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
    QByteArrayData data[23];
    char stringdata0[353];
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
QT_MOC_LITERAL(5, 59, 19), // "RequeteInsertModule"
QT_MOC_LITERAL(6, 79, 2), // "db"
QT_MOC_LITERAL(7, 82, 11), // "name_module"
QT_MOC_LITERAL(8, 94, 13), // "couleur_rouge"
QT_MOC_LITERAL(9, 108, 12), // "couleur_bleu"
QT_MOC_LITERAL(10, 121, 12), // "couleur_vert"
QT_MOC_LITERAL(11, 134, 13), // "id_equipement"
QT_MOC_LITERAL(12, 148, 23), // "RequeteSelectEquipement"
QT_MOC_LITERAL(13, 172, 19), // "onListWidgetClicked"
QT_MOC_LITERAL(14, 192, 23), // "RequeteInsertEquipement"
QT_MOC_LITERAL(15, 216, 14), // "nom_equipement"
QT_MOC_LITERAL(16, 231, 18), // "adresse_equipement"
QT_MOC_LITERAL(17, 250, 30), // "onAjoutEquipementButtonClicked"
QT_MOC_LITERAL(18, 281, 12), // "createModule"
QT_MOC_LITERAL(19, 294, 12), // "modifyModule"
QT_MOC_LITERAL(20, 307, 12), // "deleteModule"
QT_MOC_LITERAL(21, 320, 13), // "displayModule"
QT_MOC_LITERAL(22, 334, 18) // "testCreationModule"

    },
    "Webedia\0onCreationButtonClicked\0\0"
    "ConnexionBDD\0QSqlDatabase\0RequeteInsertModule\0"
    "db\0name_module\0couleur_rouge\0couleur_bleu\0"
    "couleur_vert\0id_equipement\0"
    "RequeteSelectEquipement\0onListWidgetClicked\0"
    "RequeteInsertEquipement\0nom_equipement\0"
    "adresse_equipement\0onAjoutEquipementButtonClicked\0"
    "createModule\0modifyModule\0deleteModule\0"
    "displayModule\0testCreationModule"
};
#undef QT_MOC_LITERAL

static const uint qt_meta_data_Webedia[] = {

 // content:
       8,       // revision
       0,       // classname
       0,    0, // classinfo
      12,   14, // methods
       0,    0, // properties
       0,    0, // enums/sets
       0,    0, // constructors
       0,       // flags
       0,       // signalCount

 // slots: name, argc, parameters, tag, flags
       1,    0,   74,    2, 0x0a /* Public */,
       3,    0,   75,    2, 0x0a /* Public */,
       5,    6,   76,    2, 0x0a /* Public */,
      12,    1,   89,    2, 0x0a /* Public */,
      13,    0,   92,    2, 0x0a /* Public */,
      14,    3,   93,    2, 0x0a /* Public */,
      17,    0,  100,    2, 0x0a /* Public */,
      18,    0,  101,    2, 0x0a /* Public */,
      19,    0,  102,    2, 0x0a /* Public */,
      20,    0,  103,    2, 0x0a /* Public */,
      21,    0,  104,    2, 0x0a /* Public */,
      22,    0,  105,    2, 0x0a /* Public */,

 // slots: parameters
    QMetaType::Void,
    0x80000000 | 4,
    QMetaType::Void, 0x80000000 | 4, QMetaType::QString, QMetaType::QString, QMetaType::QString, QMetaType::QString, QMetaType::Int,    6,    7,    8,    9,   10,   11,
    QMetaType::Void, 0x80000000 | 4,    6,
    QMetaType::Int,
    QMetaType::Void, 0x80000000 | 4, QMetaType::QString, QMetaType::QString,    6,   15,   16,
    QMetaType::Void,
    QMetaType::Void,
    QMetaType::Void,
    QMetaType::Void,
    QMetaType::Void,
    QMetaType::Void,

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
        case 2: _t->RequeteInsertModule((*reinterpret_cast< QSqlDatabase(*)>(_a[1])),(*reinterpret_cast< QString(*)>(_a[2])),(*reinterpret_cast< QString(*)>(_a[3])),(*reinterpret_cast< QString(*)>(_a[4])),(*reinterpret_cast< QString(*)>(_a[5])),(*reinterpret_cast< int(*)>(_a[6]))); break;
        case 3: _t->RequeteSelectEquipement((*reinterpret_cast< QSqlDatabase(*)>(_a[1]))); break;
        case 4: { int _r = _t->onListWidgetClicked();
            if (_a[0]) *reinterpret_cast< int*>(_a[0]) = std::move(_r); }  break;
        case 5: _t->RequeteInsertEquipement((*reinterpret_cast< QSqlDatabase(*)>(_a[1])),(*reinterpret_cast< QString(*)>(_a[2])),(*reinterpret_cast< QString(*)>(_a[3]))); break;
        case 6: _t->onAjoutEquipementButtonClicked(); break;
        case 7: _t->createModule(); break;
        case 8: _t->modifyModule(); break;
        case 9: _t->deleteModule(); break;
        case 10: _t->displayModule(); break;
        case 11: _t->testCreationModule(); break;
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
        if (_id < 12)
            qt_static_metacall(this, _c, _id, _a);
        _id -= 12;
    } else if (_c == QMetaObject::RegisterMethodArgumentMetaType) {
        if (_id < 12)
            *reinterpret_cast<int*>(_a[0]) = -1;
        _id -= 12;
    }
    return _id;
}
QT_WARNING_POP
QT_END_MOC_NAMESPACE
