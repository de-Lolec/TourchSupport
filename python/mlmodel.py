# Импорт необходимых библиотек 
import pandas as pd
from sklearn.model_selection import train_test_splitfrom sklearn.feature_extraction.text import CountVectorizer
from sklearn.naive_bayes import MultinomialNBfrom sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_scorefrom sklearn.preprocessing import LabelEncoder
import joblib

# Подготовка данных
X = df['utterance']
y_request = df['request']y_importance = df['importance']

# Кодирование категории request
le_request = LabelEncoder()y_request_encoded = le_request.fit_transform(y_request)

# Разделение на обучающий и тестовый наборы
X_train, X_test, y_train_request, y_test_request, y_train_importance, y_test_importance = train_test_split(    X, y_request_encoded, y_importance, test_size=0.2, random_state=42
)
# Векторизация текстаvectorizer = CountVectorizer()
X_train_vectorized = vectorizer.fit_transform(X_train)X_test_vectorized = vectorizer.transform(X_test)

# Обучение модели для категории request
nb_model_request = MultinomialNB()nb_model_request.fit(X_train_vectorized, y_train_request)

# Обучение модели для важности importance
rf_model_importance = RandomForestClassifier(random_state=42)rf_model_importance.fit(X_train_vectorized, y_train_importance)

# Оценка моделей
y_pred_request = nb_model_request.predict(X_test_vectorized)y_pred_importance = rf_model_importance.predict(X_test_vectorized)
accuracy_request = accuracy_score(y_test_request, y_pred_request)
accuracy_importance = accuracy_score(y_test_importance, y_pred_importance)
print(f"Accuracy for Request Category: {accuracy_request:.2f}")
print(f"Accuracy for Importance: {accuracy_importance:.2f}")

# Сохранение моделей на дискjoblib.dump(nb_model_request, 'nb_model_request.pkl')
joblib.dump(rf_model_importance, 'rf_model_importance.pkl')joblib.dump(le_request, 'label_encoder_request.pkl')
joblib.dump(vectorizer, 'vectorizer.pkl')



# Загрузка сохраненных моделей и кодировщика
import joblibimport pandas as pd
nb_model_request = joblib.load('nb_model_request.pkl')rf_model_importance = joblib.load('rf_model_importance.pkl')
le_request = joblib.load('label_encoder_request.pkl')vectorizer = joblib.load('vectorizer.pkl')

# Пример нового обращения
new_utterance = "I have a question about my order delivery."

# Векторизация нового обращения
new_utterance_vectorized = vectorizer.transform([new_utterance])

# Предсказание категории request
predicted_request = le_request.inverse_transform(nb_model_request.predict(new_utterance_vectorized))[0]

# Предсказание важности 
importancepredicted_importance = rf_model_importance.predict(new_utterance_vectorized)[0]

print(f"Predicted Request Category: {predicted_request}")
print(f"Predicted Importance: {predicted_importance}")