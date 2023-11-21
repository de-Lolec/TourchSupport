import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.naive_bayes import MultinomialNB
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score
from sklearn.preprocessing import LabelEncoder
import joblib
import os

# Чтение данных из файла
script_dir = os.path.dirname(__file__)
model_path = os.path.join(script_dir, 'train_data.csv')
df = pd.read_csv(model_path, sep='|')

# Подготовка данных
X = df['utterance']
y_request = df['request']
y_importance = df['importance']

# Кодирование категории request
le_request = LabelEncoder()
y_request_encoded = le_request.fit_transform(y_request)

# Разделение на обучающий и тестовый наборы
try:
    X_train, X_test, y_train_request, y_test_request, y_train_importance, y_test_importance = train_test_split(
        X, y_request_encoded, y_importance, test_size=0.2, random_state=42
    )
except ValueError as e:
    print(f"Ошибка при разделении данных: {e}")
    X_train, X_test, y_train_request, y_test_request, y_train_importance, y_test_importance = None, None, None, None, None, None

# Проверка на наличие данных для обучения
if X_train is not None and len(X_train) > 0:
    # Ваш остальной код здесь
    # Векторизация текста
    vectorizer = CountVectorizer()
    X_train_vectorized = vectorizer.fit_transform(X_train)
    X_test_vectorized = vectorizer.transform(X_test)

    # Обучение модели для категории request
    nb_model_request = MultinomialNB()
    nb_model_request.fit(X_train_vectorized, y_train_request)

    # Обучение модели для важности importance
    rf_model_importance = RandomForestClassifier(random_state=42)
    rf_model_importance.fit(X_train_vectorized, y_train_importance)

    # Оценка моделей
    y_pred_request = nb_model_request.predict(X_test_vectorized)
    y_pred_importance = rf_model_importance.predict(X_test_vectorized)
    accuracy_request = accuracy_score(y_test_request, y_pred_request)
    accuracy_importance = accuracy_score(y_test_importance, y_pred_importance)
    print(f"Точность для категории 'request': {accuracy_request:.2f}")
    print(f"Точность для 'importance': {accuracy_importance:.2f}")

    script_dir = os.path.dirname(__file__)

    # Сохранение моделей на диск
    joblib.dump(nb_model_request, os.path.join(script_dir, 'nb_model_request.pkl'))
    joblib.dump(rf_model_importance, os.path.join(script_dir, 'rf_model_importance.pkl'))
    joblib.dump(le_request, os.path.join(script_dir, 'label_encoder_request.pkl'))
    joblib.dump(vectorizer, os.path.join(script_dir, 'vectorizer.pkl'))

    print(f"Размер обучающего набора данных: {len(X_train)}")
else:
    print("Ошибка: Недостаточно данных для обучения модели.")
