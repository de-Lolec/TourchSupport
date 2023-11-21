
from flask import Flask, jsonify, request
import numpy as np
import pandas as pd
import seaborn as sns
from sklearn.model_selection import train_test_split
from sklearn.feature_extraction.text import CountVectorizer
from sklearn.naive_bayes import MultinomialNB
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score
from sklearn.preprocessing import LabelEncoder
import joblib


app = Flask(__name__)


@app.route('/predict', methods=['POST'])
def predict():
    # Загрузка сохраненных моделей и кодировщика
    nb_model_request = joblib.load('nb_model_request.pkl')
    le_request = joblib.load('label_encoder_request.pkl')
    vectorizer = joblib.load('vectorizer.pkl')
    rf_model_importance = joblib.load('rf_model_importance.pkl')
    # Пример нового обращения
    # new_utterance = "I have a question about my order delivery."
    data = request.get_json()
    # Векторизация нового обращения
    new_utterance_vectorized = vectorizer.transform([data])
    # Предсказание категории request
    predicted_request = le_request.inverse_transform(nb_model_request.predict(new_utterance_vectorized))[0]
    # Предсказание важности importance
    predicted_importance = rf_model_importance.predict(new_utterance_vectorized)[0]
    print(f"Predicted Request Category: {predicted_request}")
    print(f"Predicted Importance: {predicted_importance}")
    return jsonify(
        {"request": predicted_request, "importance": predicted_importance})


if __name__ == '__main__':
    app.run(debug=True)